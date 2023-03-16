jQuery(document).ready(function () {
    if (window.matchMedia('(max-width: 1000px)').matches) {

        const value =  jQuery('.floating-selector__nav');
        createSelector(value);

        function createSelector(value) {
            //create a dropdown container div
            const div = jQuery("<div class='selectbox__container white'></div>").appendTo(value);
            // Create the dropdown base
            const select = jQuery("<select class='selectbox__select' />").appendTo(div);

            let text = "Sectors";
            if (jQuery("body").hasClass('parent-pageid-1739')) {
                text = "Services";
            }
            // Create default option "Go to..."
            jQuery("<label />", {
                "class": "selectbox__label",
                "text": text
            }).prependTo(div);


            // Populate dropdown with menu items
            jQuery(value).find('a').each(function () {
                var el = jQuery(this);
                jQuery("<option />", {
                    "value": el.attr("href"),
                    "text": el.text()
                }).appendTo(select);
            });

            //activate the links
            jQuery(select).change(function () {
                window.location = jQuery(this).find("option:selected").val();
            });

            //delete the old menu item
            jQuery('.floating-selector__nav>.wp-block-navigation__container').remove();

        }
    }
});