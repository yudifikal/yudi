<!-- resources/views/consultation.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Consultation Form</title>
</head>

<body>
  <div class="container mt-5">
    <h2>Konsultasi dan jadwal negosiasi</h2>
    <form action="{{ route('submitOrder') }}" method="POST">
      @csrf
      <input type="hidden" name="id_kontruksi" value="{{ $id_kontruksi }}">
      <div class="mb-3">
        <label for="consultationDetails" class="form-label">Detail Konsultasi</label>
        <textarea class="form-control" id="consultationDetails" name="consultationDetails" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="scheduleDate" class="form-label">Tanggal Jadwal</label>
        <input type="date" class="form-control" id="scheduleDate" name="scheduleDate" required>
      </div>
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
