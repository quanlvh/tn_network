(function($){
    window.baseURL = window.location.origin;
    /**
     * Function: Active Javascript TAB of Bootstrap
     */
    window.activeBootstrapTabs = function () {
        $('.tabs-wrapper').each(function(){
            $(this).tab();
        });
    };

    /**
     * Window Prototype: Active Dropdown Menu
     */
    function toggleNav(wrapper){

        var cdDropdown = wrapper.find('.cd-dropdown');
        var dropdownTrigger = wrapper.find('.cd-dropdown-trigger');
        var navIsVisible = ( !cdDropdown.hasClass('dropdown-is-active') ) ? true : false;
        
        //== Clear all dropdown active
        $('.cd-dropdown').not(cdDropdown).removeClass('dropdown-is-active');
        $('.cd-dropdown-trigger').not(dropdownTrigger).removeClass('dropdown-is-active');
        
        //== Toggle Active for current Dropdown
        cdDropdown.toggleClass('dropdown-is-active', navIsVisible);
        dropdownTrigger.toggleClass('dropdown-is-active', navIsVisible);

        //== Check active for children elements
        if( !navIsVisible ) {
            cdDropdown.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
                wrapper.find('.has-children ul').addClass('is-hidden');
                wrapper.find('.move-out').removeClass('move-out');
                wrapper.find('.is-active').removeClass('is-active');
            });
        }
    }
    window.dropdownMenuActive = function () {
        $('.cd-dropdown-wrapper').each(function(){
            var wrapper = $(this);
            var cdDropdown = wrapper.find('.cd-dropdown');
            var dropdownTrigger = wrapper.find('.cd-dropdown-trigger');
            var dropdownClose = wrapper.find('.cd-dropdown .cd-close');
            var dropdownContent = wrapper.find('.cd-dropdown-content');
            var dropdownGoBack = wrapper.find('.go-back');
            //open/close mega-navigation
            dropdownTrigger.on('click', function(event){
                event.preventDefault();
                toggleNav(wrapper);
            });

            //close meganavigation
            dropdownClose.on('click', function(event){
                event.preventDefault();
                toggleNav(wrapper);
            });

            // Click Outside
            $(window).click(function() {
                //== Clear all dropdown active
                $('.cd-dropdown').not(cdDropdown).removeClass('dropdown-is-active');
                $('.cd-dropdown-trigger').not(dropdownTrigger).removeClass('dropdown-is-active');
            });

            wrapper.click(function(event){
                event.stopPropagation();
            });

            //on mobile - open submenu
            wrapper.find('.has-children').children('a').on('click', function(event){
                //prevent default clicking on direct children of .has-children
                event.preventDefault();
                var selected = $(this);
                selected.next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('move-out');
            });

            //on desktop - differentiate between a user trying to hover over a dropdown item vs trying to navigate into a submenu's contents
            var submenuDirection = ( !wrapper.hasClass('open-to-left') ) ? 'right' : 'left';
            dropdownContent.menuAim({
                activate: function(row) {
                    $(row).children().addClass('is-active').removeClass('fade-out');
                    if( dropdownContent.find('.fade-in').length == 0 ) $(row).children('ul').addClass('fade-in');
                },
                deactivate: function(row) {
                    $(row).children().removeClass('is-active');
                    if( $('li.has-children:hover').length == 0 || $('li.has-children:hover').is($(row)) ) {
                        $('.cd-dropdown-content').find('.fade-in').removeClass('fade-in');
                        $(row).children('ul').addClass('fade-out')
                    }
                },
                exitMenu: function() {
                    $('.cd-dropdown-content').find('.is-active').removeClass('is-active');
                    return true;
                },
                submenuDirection: submenuDirection,
            });

            //submenu items - go back link
            dropdownGoBack.on('click', function(){
                var selected = $(this),
                    visibleNav = $(this).parent('ul').parent('.has-children').parent('ul');
                selected.parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('move-out');
            });
        });
    };
    /**
     * Function: Active Javascript Nice Select
     * Require: jquery.nice-select.js
     */
    window.activeNiceSelectForUI = function () {
        $('.nice-select').each(function(){
            $(this).niceSelect();
        });
    };

    /**
     * Function: Active <td> have radio or checkbox inner
     * Required Boottstrap Table style and Form style.
     */
    window.activeTableCellHaveCheckbox = function () {
        //== Radio
       $('table.table-form td .radio').each(function(){
           var radioWrapper = $(this);
            var radioInput = radioWrapper.find('input');
            var nameRadios = radioInput.attr('name');
            var td = radioWrapper.parent('td');
           //== Check when loaded
           if (radioInput.is(':checked')) {
               td.not('.group-radios').addClass('active');
           }

           //== Bind Change Event
           $('[name="' + nameRadios + '"]').each(function(){
               var radios = $(this);
               radios.change(function(event){
                   $('[name="' + nameRadios + '"]').parents('.radio').parent('td').not('.group-radios').removeClass('active');
                   $(event.currentTarget).parents('.radio').parent('td').not('.group-radios').addClass('active');
               });
           });

       });
        //== Checkbox
        $('table.table-form td .checkbox').each(function(){
            var checkboxInput = $(this).find('input');
            var td = $(this).parent('td');
            //== Check when loaded
            if (checkboxInput.is(':checked')) {
                td.not('.group-checkboxs').addClass('active');
            }
            //== Check when change event
            checkboxInput.change(function(){
                if (checkboxInput.is(':checked')) {
                    td.not('.group-checkboxs').addClass('active');
                } else {
                    td.not('.group-checkboxs').removeClass('active');
                }
            });
        });
    };
    /**
     * Function active magnificPopup for element
     */
    window.activeMagnificPopup = function() {
        //== Active
        $('.open-popup-link').each(function(){
            // Active popup
            var magPopup = $(this).magnificPopup({

                type: 'inline', // this is a default type
                midClick: false,
                closeOnBgClick: true,
                closeOnContentClick: false,
                enableEscapeKey: false,
                showCloseBtn: true,
                closeMarkup: '<button title="%title%" type="button" class="mfp-close"><span class="close-icon ion-ios-close-empty"></span></button>',
                // Delay in milliseconds before popup is removed
                removalDelay: 300,

                // Class that is added to popup wrapper and background
                // make it unique to apply your CSS animations just to this exact popup
                mainClass: 'mfp-with-zoom',
                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it

                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out' // CSS transition easing function
                }
            });

        });

        //== Close
        $('.magnific-popup-close').each(function(){
            $(this).click(function(){
                $.magnificPopup.close();
            });
        });
    };
    /**
     * Additional Table Handle
     */
    window.additionalTableHandle = function() {
        $('table.table-additional').each(function(){
            var table = $(this);
            var btnAddRow = table.find('.add-row-btn');
            btnAddRow.click(function(){
                if (table.find('.data-row[data-number="0"]').length > 0) {
                    window.showSpinner();
                    var firstRow = table.find('.data-row[data-number="0"]');
                    var newRow = firstRow.clone();
                    var dataKey = table.attr('data-current-key');
                    var newKey = parseInt(dataKey) + 1;

                    newRow.attr('data-number', newKey);

                    newRow.find('.form-control').each(function(){
                        var currentId = $(this).attr('id');
                        var timeStamp = Math.floor(Date.now() / 1000);
                        $(this).attr('id',currentId + '_' + timeStamp);
                    });

                    //== Set Time Out 200
                    setTimeout(function(){
                        table.find('tbody').append(newRow);
                        table.attr('data-current-key', newKey);
                        window.hideSpinner();
                    }, 200);
                }
            });
        });
    };
    /**
	 * Implement Document Ready
     */
	$(document).ready(function(){
	    //==
        window.dropdownMenuActive();
        //==
        window.activeNiceSelectForUI();
        //==
        window.activeBootstrapTabs();
        //==
        window.activeTableCellHaveCheckbox();
        //==
        window.activeMagnificPopup();
        //==
        window.additionalTableHandle();
    });
}(jQuery));