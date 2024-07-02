<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            margin-bottom: 20px;
            text-align: justify;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="procesimi.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title *</label>
            <select id="title" name="title">
                <option value="">Select title</option>
                <option value="mr">Mr.</option>
                <option value="mrs">Mrs.</option>
                <option value="ms">Ms.</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" placeholder="Enter name">
        </div>

        <div class="form-group">
          <label for="surname">Surname *</label>
          <input type="text" id="surname" name="surname" placeholder="Enter surname">
        </div>
        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" id="email" name="email" placeholder="Enter email address">
        </div>
        <div class="form-group">
          <label for="password">Password *</label>
          <input type="password" id="password" name="password" placeholder="Enter password">
        </div>
        <div class="form-group">
          <label for="phone-number">Phone Number *</label>
          <input type="tel" id="phone-number" name="phone-number" placeholder="Enter phone number">
        </div>
        <div class="form-group">
          <label for="university">University *</label>
          <input type="text" id="university" name="university" placeholder="Enter university">
        </div>
        <div class="form-group">
          <label for="department">Department *</label>
          <input type="text" id="department" name="department" placeholder="Enter department">
        </div>
        <div class="form-group">
          <label for="topic">Topic *</label>
          <select id="topic" name="topic">
            <option value="">Select topic</option>
            <option value="topic1">Topic 1</option>
            <option value="topic2">Topic 2</option>
            <!-- Add more options if needed -->
          </select>
        </div>
        <div class="form-group">
          <label for="presentation-type">Presentation Type *</label>
          <select id="presentation-type" name="presentation-type">
            <option value="">Select presentation type</option>
            <option value="oral">Oral</option>
            <option value="poster">Poster</option>
            <!-- Add more options if needed -->
          </select>
        </div>
        <div class="form-group">
          <label for="abstract-title">Abstract Title *</label>
          <input type="text" id="abstract-title" name="abstract-title" placeholder="Enter abstract title">
        </div>
        <div class="form-group">
          <label for="abstract-file">Abstract File</label>
          <input type="file" id="abstract-file" name="abstract-file">
        </div>
        <div class="form-group">
          <label for="accommodation-type">Accommodation Type *</label>
          <select id="accommodation-type" name="accommodation-type">
            <option value="">Select accommodation type</option>
            <option value="single">Single</option>
            <option value="double">Double</option>
            <!-- Add more options if needed -->
          </select>
        </div>
        <div class="form-group">
          <label for="room-type">Room Type *</label>
          <select id="room-type" name="room-type">
            <option value="">Select room type</option>
            <option value="standard">Standard</option>
            <option value="suite">Suite</option>
            <!-- Add more options if needed -->
          </select>
        </div>
        <div class="form-group">
          <label for="accompanying-persons">Accompanying Persons *</label>
          <div>
            <label><input type="radio" name="accompanying-persons" value="yes"> Yes</label>
            <label><input type="radio" name="accompanying-persons" value="no"> No</label>
          </div>
        </div>
        <div class="form-group" id="hotel-dates">
          <label for="hotel-check-in">Hotel Check In Date</label>
          <input type="text" id="hotel-check-in" name="hotel-check-in" placeholder="dd/mm/yyyy">
          <label for="hotel-check-out">Hotel Check Out Date</label>
          <input type="text" id="hotel-check-out" name="hotel-check-out" placeholder="dd/mm/yyyy">
        </div>
        
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>
