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
            box-sizing: border-box;
        }
       
        nav {
            background-color: #007bff;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #0056b3;
            color: white;
        }
        .right-links {
            float: right;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
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
   
    <nav>
        <a href="/">Home</a>
        <a style="margin-right:-1150px;" href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </nav>
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
        <div class="select-row">
            <label for="skill" class="skill-label">Skill</label>
            <select id="skill" name="skill" required>
                <option value="">Select Skill</option>
                @foreach($skills as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
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
