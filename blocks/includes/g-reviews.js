(function ($) {
  $.fn.googlePlaces = function (options) {
    // This is the easiest way to have default options.
    var settings = $.extend(
      {
        // These are the defaults.
        header: "",
        footer: "",
        maxRows: 5,
        minRating: 1,
        months: ["st", "lut", "mrz", "kw", "maj", "cz", "lip", "sier", "wrz", "paź", "lis", "gr"],
        textBreakLength: "10",
        shortenNames: true,
        placeId: "",
        moreReviewsButtonUrl: "",
        moreReviewsButtonLabel: "Show More Reviews",
        writeReviewButtonUrl: "",
        writeReviewButtonLabel: "Write New Review",
        showReviewDate: true,
        showProfilePicture: true
      },
      options
    );

    var targetDiv = this[0];
    var targetDivJquery = this;

    var renderMoreReviewsButton = function () {
      return '<div class="more-reviews "><a class="btt" href="' + settings.moreReviewsButtonUrl + '" target="_blank">' + settings.moreReviewsButtonLabel + "</a></div>";
    };

    var renderWriteReviewButton = function () {
      return '<div class="write-review "><a class="btt btt-rev" href="' + settings.writeReviewButtonUrl + '" target="_blank">' + settings.writeReviewButtonLabel + "</a></div>";
    };

    var renderPicture = function (picture) {
      return "<img class='review-picture' src='" + picture + "'>";
    };

    var renderHeader = function (header) {
      var html = "";
      html += header + "";
      targetDivJquery.append(html);
    };

    var renderFooter = function (footer) {
      var html = "";
      var htmlButtons = "";

      if (settings.moreReviewsButtonUrl) {
        htmlButtons += renderMoreReviewsButton();
      }
      if (settings.writeReviewButtonUrl) {
        htmlButtons += renderWriteReviewButton();
      }
      if (htmlButtons != "") {
        html += '<div class="buttons">' + htmlButtons + "</div>";
      }

      html += "<br>" + footer + "<br>";
      targetDivJquery.after(html);
    };

    var shortenName = function (name) {
      if (name.split(" ").length > 1) {
        var shortenedName = "";
        shortenedName = name.split(" ");
        var lastNameFirstLetter = shortenedName[1][0];
        var firstName = shortenedName[0];
        if (lastNameFirstLetter == ".") {
          return firstName;
        } else {
          return firstName + " " + lastNameFirstLetter + ".";
        }
      } else if (name != undefined) {
        return name;
      } else {
        return "";
      }
    };

    var renderStars = function (rating) {
      var stars = '<div class="review-stars"><ul>';
      // fills gold stars
      for (var i = 0; i < rating; i++) {
        stars += '<li><i class="star"></i></li>';
      }
      // fills empty stars
      if (rating < 5) {
        for (var i = 0; i < 5 - rating; i++) {
          stars += '<li><i class="star inactive"></i></li>';
        }
      }
      stars += "</ul></div>";
      return stars;
    };

    var convertTime = function (UNIX_timestamp) {
      var newDate = new Date(UNIX_timestamp * 1000);
      var months = settings.months;
      var time = newDate.getDate() + ". " + months[newDate.getMonth()] + " " + newDate.getFullYear();
      return time;
    };

    var filterReviewsByMinRating = function (reviews) {
      if (reviews === void 0) {
        return [];
      } else {
        for (var i = reviews.length - 1; i >= 0; i--) {
          var review = reviews[i];
          if (review.rating < settings.minRating) {
            reviews.splice(i, 1);
          }
        }
        return reviews;
      }
    };

    var sortReviewsByDateDesc = function (reviews) {
      if (typeof reviews != "undefined" && reviews != null && reviews.length != null && reviews.length > 0) {
        return reviews
          .sort(function (a, b) {
            return a.time > b.time ? 1 : b.time > a.time ? -1 : 0;
          })
          .reverse();
      } else {
        return [];
      }
    };

    var renderReviews = function (reviews) {
      reviews.reverse();
      var html = "";
      var rowCount = settings.maxRows > 0 ? settings.maxRows - 1 : reviews.length - 1;

      rowCount = rowCount > reviews.length - 1 ? reviews.length - 1 : rowCount;
      for (var i = rowCount; i >= 0; i--) {
        var review = reviews[i];
        var stars = renderStars(review.rating);
        var date = convertTime(review.time);
        var name = settings.shortenNames ? shortenName(review.author_name) : review.author_name;
        var style = review.text.length > parseInt(settings.textBreakLength) ? "review-item-long" : "review-item";

        var picture = "";
        if (settings.showProfilePicture) {
          picture = renderPicture(review.profile_photo_url);
        }

        html =
          html +
          "<div class='swiper-slide'><div class='review-item'>\
                  <div class='review-header'>\
                  <div class='review-header-inner'>\
                  <img src='" +
          reviews[i].profile_photo_url +
          "'/>\
                  <div class='review-op'>\
                  <div class='review-meta'>\
                  <span class='review-author'>" +
          reviews[i].author_name +
          "</span>\
                  <span class='review-date' >" +
          date +
          "</span>\
                  </div>\
                  " +
          stars +
          "\
                  </div>\
                  </div>\
                  </div>\
                  <div class='review-inner'>\
                  <p class='review-text' >" +
          reviews[i].text +
          "</p>\
                  </div>\
                  </div></div>";
        // +"<br><span class='review-date'>"+date+"</span>"+
      }
      targetDivJquery.append(html);
    };

    // GOOGLE PLACES API CALL STARTS HERE

    // initiate a Google Places Object
    var service = new google.maps.places.PlacesService(targetDiv);
    // set.getDetails takes 2 arguments: request, callback
    // see documentation here:  https://developers.google.com/maps/documentation/javascript/3.exp/reference#PlacesService
    const request = {
      placeId: settings.placeId
    };
    // the callback is what initiates the rendering if Status returns OK
    var callback = function (place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        var filteredReviews = filterReviewsByMinRating(place.reviews);
        var sortedReviews = sortReviewsByDateDesc(filteredReviews);
        if (sortedReviews.length > 0) {
          renderHeader(settings.header);
          renderReviews(sortedReviews);
          renderFooter(settings.footer);
        }
      }
    };

    return this.each(function () {
      // Runs the Plugin
      if (settings.placeId === undefined || settings.placeId === "") {
        console.error("NO PLACE ID DEFINED");
        return;
      }
      service.getDetails(request, callback);
    });
  };
})(jQuery);
jQuery("#google-reviews").googlePlaces({
  placeId: "AIzaSyDly-SBtTw7KJVvlOPKlwtdARjiU-I95u4",
  render: ["reviews"],
  maxRows: 5,
  minRating: 2,
  textBreakLength: "1"
  // moreReviewsButtonLabel: 'Pokaż więcej opinini',
  // writeReviewButtonUrl: 'https://www.google.com/search?client=opera&q=Global+Elite+Car+⭐+Wypożyczalnia+samochodów+sportowych+i+luksusowych&sourceid=opera&ie=UTF-8&oe=UTF-8#lrd=0x471ecb77b415cef1:0x64b9af3d7a745962,1,,,',
  // writeReviewButtonLabel: 'Napisz opinię',
  // moreReviewsButtonUrl:"https://www.google.com/search?client=opera&q=Global+Elite+Car+⭐+Wypożyczalnia+samochodów+sportowych+i+luksusowych&sourceid=opera&ie=UTF-8&oe=UTF-8#lrd=0x471ecb77b415cef1:0x64b9af3d7a745962,3,,,"
});

setTimeout(function () {
  var swiper = new Swiper(".slider", {
    slidesPerView: "auto",
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
}, 1000);
