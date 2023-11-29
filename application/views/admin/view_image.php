<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Uploaded Image</title>
</head>
<body>
    <h1>Uploaded Image</h1>
    <!-- <?php if(isset($applicant_photo) && $applicant_photo): ?> -->
        <img src="<?= base_url($applicant_photo); ?>" alt="Uploaded Image">
        <img src="<?= base_url($aadhar_photo); ?>" alt="Uploaded Image">
    <!-- <?php else: ?>
        <p>No image uploaded yet.</p>
    <?php endif; ?> -->
</body>
</html>
