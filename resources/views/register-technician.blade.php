<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="file"],
        select {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        /* Position skill label and dropdown in the same row */
        div.select-row {
            display: flex;
            align-items: center;
        }
        label.skill-label {
            margin-right: 15px;
            width: 10%;
            text-align: left;
            flex-shrink: 0;
        }
        
    </style>
</head>
<body>
    <form method="POST" action="{{ route('register-technician') }}" enctype="multipart/form-data">
        @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div>
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div>
            <label for="contactnumber">Contact Number</label>
            <input type="number" id="contactnumber" name="contactnumber" min="0" required>
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <!-- Skill label and dropdown on the same row -->
        <div class="select-row">
            <label for="skill" class="skill-label">Skill</label>
            <select id="skill" name="skill" required>
                <option value="">Select Skill</option>
                <option value="Electrician">Electrician</option>
                <option value="Plumber">Plumber</option>
            </select>
        </div>
        <div>
            <label for="yearsofexperience">Years of Experience</label>
            <input type="number" id="yearsofexperience" name="yearsofexperience">
        </div>
        <div>
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div>
            <label for="profilepic">Profile Picture</label>
            <input type="file" id="profilepic" name="profilepic">
        </div>
        <button type="submit">Register Technician</button>
    </form>
</body>
</html>
