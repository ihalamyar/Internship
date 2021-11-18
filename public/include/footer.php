<!-- External JavaScripts -->
<!-- CSS only -->
<!-- JavaScript Bundle with Popper -->

<script src="/public/assets/js/jquery.min.js"></script>
<script src="/public/assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="/public/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="/public/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/public/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="/public/assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="/public/assets/vendors/counter/waypoints-min.js"></script>
<script src="/public/assets/vendors/counter/counterup.min.js"></script>
<script src="/public/assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="/public/assets/vendors/masonry/masonry.js"></script>
<script src="/public/assets/vendors/masonry/filter.js"></script>
<script src="/public/assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='/public/assets/vendors/scroll/scrollbar.min.js'></script>
<script src="/public/assets/js/functions.js"></script>
<script src="/public/assets/vendors/chart/chart.min.js"></script>
<script src="/public/assets/js/admin.js"></script>
<script src='/public/assets/vendors/calendar/moment.min.js'></script>
<script src='/public/assets/vendors/calendar/fullcalendar.js'></script>
<script src='/public/assets/vendors/switcher/switcher.js'></script>
<!-- timepicker -->
<script src='/public/admin/assets/js/bootstrap-datetimepicker.min.js'></script>

<!-- this is for purchasing a course link -->
<script src="/app/ajax/apply.js"></script>
<!-- this is for make new event  -->
<script src="/app/ajax/event.js"></script>
<script src="/app/ajax/event_edit.js"></script>
<script src="/app/ajax/payment_receipt.js"></script>
<script src="/app/ajax/join_event.js"></script>
<script src="/app/ajax/upload_event_payment.js"></script>
<script src="/app/ajax/approve_event_payment.js"></script>
<script src="/app/ajax/profile_edit.js"></script>

<!-- modal.upload_purchase_image, this is the payment receipt -->
<!-- e -->
<script>
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2019-03-12',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [{
          title: 'All Day Event',
          start: '2019-03-01'
        },
        {
          title: 'Long Event',
          start: '2019-03-07',
          end: '2019-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-03-11',
          end: '2019-03-13'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T10:30:00',
          end: '2019-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-03-28'
        }
      ]
    });

  });
// accept only number
var inputBox = $('#age').on('input', function(e) {
  e.preventDefault();
  $(this).val($(this).val().replace(/[^0-9]/g, ''));
});
</script>
</body>

</html>