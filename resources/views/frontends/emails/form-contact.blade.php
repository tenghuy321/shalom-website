<h2>New Contact Form Submission</h2>

<p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
<p><strong>Second Name:</strong> {{ $data['second_name'] ?? '-' }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] ?? '-' }}</p>
<p><strong>Company:</strong> {{ $data['company'] ?? '-' }}</p>
<p><strong>Job Title:</strong> {{ $data['job_title'] ?? '-' }}</p>
<p><strong>Service :</strong> {{ $data['service_title'] ?? '-' }}</p>

<p><strong>Message:</strong><br>{{ $data['message'] }}</p>
