<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- Fontawesome -->
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>

<!-- AWN -->
<script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/awesome-notifications@3.1.3/dist/index.var.js" integrity="sha256-+rNNdatndGD9prNAKWGIJy19rby2RqR/DzfsXd+3plw="></script>
<script>
  const awnOptions = {
    position: 'bottom-right',
    maxNotifications: 4,
    durations: {
      global: 4000
    },
    icons: {
      enabled: false,
    }
  }
  const awn = new AWN(awnOptions);
</script>