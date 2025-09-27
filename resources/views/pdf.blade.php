<!DOCTYPE html>
<html>
<head>
    <title>{{ $report->filename }}</title>
</head>
<body>
    <h1>Report: {{ $report->filename }}</h1>
    <p>Uploaded by: {{ $report->user->name }}</p>
    <p>File Type: {{ $report->file_type }}</p>
</body>
</html>