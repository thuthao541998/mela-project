$('.filter-btn select[name=categoryId] , .filter-btn select[name=brandId]').change(function () {
     
      var categoryId = $('.filter-btn select[name=categoryId]').val();
      var brandId = $('.filter-btn select[name=brandId]').val(); 

      if (brandId == null && categoryId == null) {
            window.location.href = $('.filter-btn').attr('action');
            return false;
      } else if (brandId == null) {
            window.location.href = $('.filter-btn').attr('action') + '?categoryId=' + categoryId;
      } else if (categoryId == null) {
            window.location.href = $('.filter-btn').attr('action') + '?brandId=' + brandId;
      }  else {
            window.location.href = $('.filter-btn').attr('action') + '?categoryId=' + categoryId + '&brandId=' + brandId;
      };
});