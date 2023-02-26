
document.addEventListener('DOMContentLoaded', setupCategorySelector, false);

function setupCategorySelector() {

    const getCheckedSectors = function (e) {
        const checkedSet = e.find("input:checked");
        var values = [];
        jQuery.each(checkedSet, function (i, value) {
            values.push(value.value);
        })
        console.log(values);
        return values;
    }

    function getResults(sectors, services, types) {
        var data = {
            'action': 'tapacode_selector',
            '_ajax_nonce': ajax_object.nonce,
            'sectors': JSON.stringify(sectors),
            'services': JSON.stringify(services),
            'types': JSON.stringify(types)
        };

        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        jQuery.get(ajax_object.ajax_url, data, function (res) {
            jQuery('#results').html(res);
        });
    }

    jQuery("input[type=checkbox]").on("click", function () {
        const sectors = getCheckedSectors(jQuery('#js-sectors'));
        const types = getCheckedSectors(jQuery('#js-types'));
        const services = getCheckedSectors(jQuery('#js-services'));
        getResults(sectors, services, types);
    });

}