
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

    function getResults(sectors, services, types, search, orderby, order) {
        const postType = jQuery('#results').attr('data-type');
        debugger;
        var data = {
            'action': 'tapacode_selector',
            '_ajax_nonce': ajax_object.nonce,
            'sectors': sectors.length ? JSON.stringify(sectors) : JSON.stringify(["uncategorized", "capital-markets", "energy", "financial-services", "industrials", "technology"]),
            'services': services.length ? JSON.stringify(services) : JSON.stringify(["brand-insights-strategy", "digital-marketing", "pr-comms", "websites", "campaigns-content", "esg-comms"]), 
            'types': types.length ? JSON.stringify(types) : JSON.stringify(['news, insight']),
            'search': search ? search : '',
            'orderby': orderby ? orderby : 'title',
            'order': order ? order : 'ASC',
            'post_type': postType ? postType : 'post'
        };
        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        jQuery.get(ajax_object.ajax_url, data, function (res) {
            jQuery('#results').html(res);
        });
    }

    function getSearchValue() {
        const search = jQuery('#js-search').val();
        console.log(search)
        return search;
    }

    function getOrderby() {
        let value = jQuery('#sortbox').val();
        value = value.split("&");
        value = value[0].split("=");
        return value[1];
    }

    function getOrder() {
        let value = jQuery('#sortbox').val();
        value = value.split("&");
        value = value[1].split("=");
        return value[1];
    }

    function handleAjaxRequest() {
        const sectors = getCheckedSectors(jQuery('#js-sectors'));
        const types = getCheckedSectors(jQuery('#js-types'));
        const services = getCheckedSectors(jQuery('#js-services'));
        const search = getSearchValue();
        const orderby = getOrderby();
        const order = getOrder();
        getResults(sectors, services, types, search, orderby, order);
    }


    function toggleFilterBar() {
        const link = jQuery('.js-filter-link');
        const container = jQuery('.js-filters__container');

        if (link.hasClass('active')) {
            container.removeClass('active');
            link.removeClass('active');
        }
        else {
            container.addClass('active');
            link.addClass('active');
        }
    };

    jQuery('#js-search').change(handleAjaxRequest);
    jQuery("input[type=checkbox]").on("click", handleAjaxRequest);
    jQuery('#sortbox').change(handleAjaxRequest);
    jQuery('.js-filter-link').on("click", toggleFilterBar);
}