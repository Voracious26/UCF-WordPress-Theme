(function () {
  wp.customize.bind('ready', () => {

    wp.customize.control('default_header_setting', (control) => {

      const toggleControl = (value) => {
        if (value === 'upload-custom') {
          wp.customize.control('predefined_default_header').toggle(false);
          wp.customize.control('custom_default_header_text_color').toggle(true);
          wp.customize.control('upload_custom_default_header_sm_plus').toggle(true);
          wp.customize.control('upload_custom_default_header_xs').toggle(true);
        } else {
          wp.customize.control('predefined_default_header').toggle(true);
          wp.customize.control('custom_default_header_text_color').toggle(false);
          wp.customize.control('upload_custom_default_header_sm_plus').toggle(false);
          wp.customize.control('upload_custom_default_header_xs').toggle(false);
        }
      };

      toggleControl(control.setting.get());
      control.setting.bind(toggleControl);
    });
  });
}(jQuery));
