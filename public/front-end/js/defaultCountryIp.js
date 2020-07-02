var country='pe';
$("#textnumerores").intlTelInput({
  initialCountry:country,
//  geoIpLookup: function(callback) {
//    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
//      var countryCode = (resp && resp.country) ? resp.country : "";
//      callback(countryCode);
//        alert(resp.country);
//    });
//  },

  utilsScript: $('#texturl').val()+"public/front-end/js/utils.js" // just for formatting/placeholders etc
});