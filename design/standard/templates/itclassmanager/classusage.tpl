<div class="u-content">
    <div class="u-content-main">
        {if is_set($error)}
            <div class="Prose Alert Alert--error Alert--withIcon u-layout-prose u-padding-r-bottom u-padding-r-right u-margin-r-bottom" role="alert">
                <h2 class="u-text-h3">
                    Si è verificato un errore
                </h2>
                <p class="u-text-p">
                    {$error}
                </p>
            </div>
        {else}
            <div class="u-content-title">
                <a href="{"/openpa/classes"|ezurl('no')}" class="Button Button--info">
                    <i class="mdi mdi-arrow-left"></i>
                    Classi di contenuto
                </a>

                <h1>
                    {$class.name}
                </h1>

                <div class="u-content-abstract">
                    Visualizza in quali siteaccess la classe è installata e se è sincronizzata.
                </div>
            </div>

            <table class="Table Table--striped Table--compact">
                <thead>
                    <tr>
                        <th>Siteaccess</th>
                        <th>Url</th>
                        <th>Differenze</th>
                        <th>Sincronizza</th>
                    </tr>
                </thead>
                <tbody id="siteAccessList">
                    {foreach $siteAccessList as $index => $siteAccess}
                        <tr id="{$siteAccess}">
                            <td>{$siteAccess}</td>
                            <td id="{$siteAccess}-url">{$siteUrlList[$index]}</td>
                            <td id="{$siteAccess}-diff">
                                <i>caricamento...</i>
                            </td>
                            <th>
                                <a class="Button Button--default" href="{concat("https://", $siteUrlList[$index], "/openpa/class/", $class.identifier)}" >
                                    <i class="mdi mdi-arrow-left-right-bold-outline"></i>
                                    Sincronizza
                                </a>
                            </th>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        {/if}
    </div>
</div>

{literal}
<script>
    var class_identifier = '{/literal}{$class.identifier}{literal}';

    $(document).ready(function () {
        $("#siteAccessList tr").each(function () {
            let __siteaccess = $(this).attr('id');
            let __url = $("#" +  __siteaccess + "-url").html();

            $.ajax(
                {
                    "url": "https://" + __url + '/itclassmanager/openpa_class/' + class_identifier + '?format=json',
                    "success": function (result) {
                        console.log(result);
                        if(
                            result.hasWarning ||
                            result.hasNotice ||
                            result.hasDiffAttributes ||
                            result.hasDiffProperties ||
                            result.hasMissingAttributes ||
                            result.hasExtraAttributes
                        ){
                            $("#" + __siteaccess + "-diff").html(
                                '<span class="u-color-60"><b>Classe non sincronizzata</b></span>'
                            );
                        }
                        else if(result.error){
                            $("#" + __siteaccess + "-diff").html(
                                '<span class="u-color-40"><b>'+result.error+'</b></span>'
                            );
                        }
                        else{
                            $("#" + __siteaccess + "-diff").html(
                                '<span class="u-color-compl-80"><b>Classe sincronizzata</b></span>'
                            );
                        }

                    },
                    "error": function (result) {
                        $("#" + __siteaccess + "-diff").html(
                            '<span class="u-color-80"><i>Impossibile verificare</i></span>'
                        );

                    }
                }
            )

            console.log(__url);
        })
    });
</script>
{/literal}
