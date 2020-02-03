$("#userstammform-company").on("change input paste",function(){
    $("#userstammform-emailforinternalcommunication").val(convertToMail($(this).val()));
});

/**
 * Replaces assorted characters with mail-friendly equivalents
 *
 * @param companyName
 * @returns {string}
 */
function convertToMail(companyName)
{
    companyName = companyName.toLowerCase();
    companyName = companyName.replace(/�/g, 'ae');
    companyName = companyName.replace(/�/g, 'oe');
    companyName = companyName.replace(/�/g, 'ue');
    companyName = companyName.replace(/�/g, 'ss');
    companyName = companyName.replace(/ /g, '-');
    companyName = companyName.replace(/\./g, '');
    companyName = companyName.replace(/,/g, '');
    companyName = companyName.replace(/\(/g, '');
    companyName = companyName.replace(/\)/g, '');
    companyName = companyName.replace(/\@/g, '');
    companyName = companyName.replace(/\\/g, '');
    companyName = companyName.replace(/\//g, '');
    return companyName;
}