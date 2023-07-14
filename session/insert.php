<?php
$conn = mysqli_connect('localhost','root','','formuser') or die('connection failed');

if(isset($_POST['send'])){
  $image = file_get_contents($_FILES["image"]["tmp_name"]);
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $address = isset($_POST['address']) ? $_POST['address'] : '';
  $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
  $age = isset($_POST['age']) ? $_POST['age'] : '';
  $experience_years = isset($_POST['experience_years']) ? $_POST['experience_years'] : '';
  $front_page_summary = isset($_POST['front_page_summary']) ? $_POST['front_page_summary'] : '';
  $biography_summary = isset($_POST['biography_summary']) ? $_POST['biography_summary'] : '';
  $skill1 = isset($_POST['skill1']) ? $_POST['skill1'] : '';
  $skill1_percentage = isset($_POST['skill1_percentage']) ? $_POST['skill1_percentage'] : '';
  $skill2 = isset($_POST['skill2']) ? $_POST['skill2'] : '';
  $skill2_percentage = isset($_POST['skill2_percentage']) ? $_POST['skill2_percentage'] : '';
  $education_start_year = isset($_POST['education_start_year']) ? $_POST['education_start_year'] : '';
  $education_end_year = isset($_POST['education_end_year']) ? $_POST['education_end_year'] : '';
  $education_type = isset($_POST['education_type']) ? $_POST['education_type'] : '';
  $education_name = isset($_POST['education_name']) ? $_POST['education_name'] : '';
  $education_gpa = isset($_POST['education_gpa']) ? $_POST['education_gpa'] : '';
  $experience_start_year = isset($_POST['experience_start_year']) ? $_POST['experience_start_year'] : '';
  $experience_end_year = isset($_POST['experience_end_year']) ? $_POST['experience_end_year'] : '';
  $employment_type = isset($_POST['employment_type']) ? $_POST['employment_type'] : '';
  $organization_name = isset($_POST['organization_name']) ? $_POST['organization_name'] : '';
  $position = isset($_POST['position']) ? $_POST['position'] : '';
  $service_topic = isset($_POST['service_topic']) ? $_POST['service_topic'] : '';
  $service_summary = isset($_POST['service_summary']) ? $_POST['service_summary'] : '';
    

  $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE image = '$image' AND name = '$name' AND email = '$email' AND address = '$address' AND contact_number = '$contact_number' AND age = '$age' AND experience_years = '$experience_years' AND front_page_summary = '$front_page_summary' AND biography_summary = '$biography_summary' AND skill1 = '$skill1' AND skill1_percentage = '$skill1_percentage' AND skill2 = '$skill2' AND skill2_percentage = '$skill2_percentage' AND education_start_year = '$education_start_year' AND education_end_year = '$education_end_year' AND education_type = '$education_type' AND education_name = '$education_name' AND education_gpa = '$education_gpa' AND experience_start_year = '$experience_start_year' AND experience_end_year = '$experience_end_year' AND employment_type = '$employment_type' AND organization_name = '$organization_name' AND position = '$position' AND service_topic = '$service_topic' AND service_summary = '$service_summary'");


  // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO user_data (image, name, email, address, contact_number, age, experience_years, front_page_summary, biography_summary, skill1, skill1_percentage, skill2, skill2_percentage, education_start_year, education_end_year, education_type, education_name, education_gpa, experience_start_year, experience_end_year, employment_type, organization_name, position, service_topic, service_summary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("bsssissssisiiissssiis", $image, $name, $email, $address, $contact_number, $age, $experience_years, $front_page_summary, $biography_summary, $skill1, $skill1_percentage, $skill2, $skill2_percentage, $education_start_year, $education_end_year, $education_type, $education_name, $education_gpa, $experience_start_year, $experience_end_year, $employment_type, $organization_name, $position, $service_topic, $service_summary);

    // Execute the statement
    $stmt->execute();
    
    // Check for any errors
    if ($stmt->error) {
        die("Error: " . $stmt->error);
    }
    
    // Close the statement
    $stmt->close();
}

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
  /* Style for the image container */
  .image {
    text-align: center;
  }

/* Style for the profile image */
#profile-image {
  width: 200px;
  height: 200px;
  border-radius: 0;
  object-fit: cover;
  margin-bottom: 10px;
}


  /* Style for the button */
  .btn {
    padding: 8px 16px;
    background-color: #428bca;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  /* Style for the content container */
  .content {
    max-width: 500px;
    margin: 0 auto;
  }

  /* Style for the heading */
  h3 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  /* Style for the text inputs */
  input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  /* Style for the textareas */
  textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
 
/* Styles for Skills Section */

/* Container */
.skills {
  padding: 50px;
}

/* Heading */
.heading {
  text-align: center;
  margin-bottom: 30px;
}

/* Skills Container */
#skills-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* Skill Bar */
.bar {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 15px;
  background-color: #f2f2f2;
  padding: 10px;
  border-radius: 5px;
}

/* Skill Name */
.bar h3 {
  margin: 0;
}

.bar input[type="text"] {
  width: 100px;
  padding: 10px;
  border: none;
  border-radius: 5px;
}

/* Skill Percentage */
.bar input[type="number"] {
  width: 100px;
  padding: 8px;
  border: none;
  border-radius: 4px;
}

/* Add Skill Button */
button {
  display: block;
  margin: 20px auto;
  padding: 10px 20px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Styles for Education & Experience Section */

/* Container */
.edu-exp {
  padding: 50px;
}

/* Heading */
.heading {
  text-align: center;
  margin-bottom: 30px;
}

/* Box Container */
.box-container {
  margin-bottom: 20px;
}

/* Title */
.title {
  margin: 0;
}

/* Box */
.box {
  background-color: #f2f2f2;
  padding: 10px;
  border-radius: 5px;
}

/* Input Fields */
.box input[type="text"],
.box input[type="number"] {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
  border: none;
  border-radius: 5px;
}

/* Button */
button {
  display: block;
  margin: 20px auto;
  padding: 10px 20px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
/* Style for the submit button */
input[type="submit"] {
  display: block;
  margin: 0 auto;
  padding: 16px 32px;
  font-size: 18px;
  background-color: #428bca;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Hover effect for the submit button */
input[type="submit"]:hover {
  background-color: #3272a8;
}

/* Pressed effect for the submit button */
input[type="submit"]:active {
  background-color: #266197;
}
</style>

    <script>
          function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();

    reader.onload = function() {
      var img = document.getElementById("profile-image");
      img.src = reader.result;
    };

    reader.readAsDataURL(input.files[0]);
  }
</script>


</head>
<body>
<section class="home" id="home">

<div class="image" data-aos="fade-right">
  <img id="profile-image" src="images/placeholder.jpg" alt="">
  <input type="file" accept="image/*" onchange="previewImage(event)" class="btn">
</div>

<div class="content">
  <h3 data-aos="fade-up"><span><input type="text" id="name-input" placeholder="Your Name"></span></h3>
  <p><input data-aos="fade-up" type="text" id="quality-input" placeholder="Your Email"></p>
  <p><input data-aos="fade-up" type="text" id="quality-input" placeholder="Your Address"></p>
  <p><input type="text" id="quality-input" placeholder="Your contact Number"></p>
  <p><input type="text" id="quality-input" placeholder="Your Age"><p>
  <input type="text" id="quality-input" placeholder="of experience in year(eg. 2 years)">
  <p data-aos="fade-up">
    <textarea id="summary-input" placeholder="explain yourself for front page (max:150 words)" maxlength="150"></textarea>
  </p>
  <p data-aos="fade-up">
    <textarea id="summary-input" placeholder="Summary of User for Biography(max:255 words)" maxlength="255"></textarea>
  </p>
</div>

<div>
  <h1 class="heading"> <span>Skills</span> </h1>

  <div class="progress" id="skills-container">
    <div class="bar" data-aos="fade-left">
      <h3><span><input type="text" placeholder="Skill 1"></span></h3>
      <span><input type="number" placeholder="Percentage"></span>
    </div>
    <div class="bar" data-aos="fade-right">
      <h3><span><input type="text" placeholder="Skill 2"></span></h3>
      <span><input type="number" placeholder="Percentage"></span>
    </div>
  </div>

  <button onclick="addSkill()">Add Skill</button>
</div>

<script>
  function addSkill() {
    var container = document.getElementById("skills-container");
    var skillCount = container.children.length;

    var newSkillDiv = document.createElement("div");
    newSkillDiv.classList.add("bar");

    var skillNameInput = document.createElement("input");
    skillNameInput.type = "text";
    skillNameInput.placeholder = "Skill " + (skillCount + 1);

    var skillPercentageInput = document.createElement("input");
    skillPercentageInput.type = "number";
    skillPercentageInput.placeholder = "Percentage";

    var skillNameHeading = document.createElement("h3");
    skillNameHeading.appendChild(document.createElement("span")).appendChild(skillNameInput);

    var skillPercentageSpan = document.createElement("span");
    skillPercentageSpan.appendChild(skillPercentageInput);

    newSkillDiv.appendChild(skillNameHeading);
    newSkillDiv.appendChild(skillPercentageSpan);

    container.appendChild(newSkillDiv);
  }
</script>


<div class="edu-exp">
  <h1 class="heading" data-aos="fade-up"> <span>Education</span> </h1>
  <div class="row">
    <div class="box-container" id="education-container">
      <h3 class="title" data-aos="fade-right">Education</h3>
      <div class="box" data-aos="fade-right">
        Start Year: <input type="text" placeholder="From year">
        <p>End Year: <input type="text" placeholder="To year"></p>
        <p>Type: <input type="text" placeholder="Degree type"></p>
        <p>Name: <input type="text" placeholder="College/University name"></p>
        <p>GPA: <input type="number" step="0.01" placeholder="GPA"></p>
      </div>
    </div>
  </div>

  <button onclick="addEducation()">Add Education</button>
</div>

<script>
  function addEducation() {
    var container = document.getElementById("education-container");
    var educationCount = container.children.length;

    var newEducationDiv = document.createElement("div");
    newEducationDiv.classList.add("box-container");

    var newTitle = document.createElement("h3");
    newTitle.classList.add("title");
    newTitle.setAttribute("data-aos", "fade-right");
    newTitle.textContent = "Education";

    var newBoxDiv = document.createElement("div");
    newBoxDiv.classList.add("box");
    newBoxDiv.setAttribute("data-aos", "fade-right");

    var startYearInput = document.createElement("input");
    startYearInput.type = "text";
    startYearInput.placeholder = "From year";

    var endYearInput = document.createElement("input");
    endYearInput.type = "text";
    endYearInput.placeholder = "To year";

    var degreeTypeInput = document.createElement("input");
    degreeTypeInput.type = "text";
    degreeTypeInput.placeholder = "Degree type";

    var universityNameInput = document.createElement("input");
    universityNameInput.type = "text";
    universityNameInput.placeholder = "College/University name";

    var gpaInput = document.createElement("input");
    gpaInput.type = "number";
    gpaInput.step = "0.01";
    gpaInput.placeholder = "GPA";

    newBoxDiv.appendChild(document.createTextNode("Start Year: "));
    newBoxDiv.appendChild(startYearInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("End Year: "));
    newBoxDiv.appendChild(endYearInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("Type: "));
    newBoxDiv.appendChild(degreeTypeInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("Name: "));
    newBoxDiv.appendChild(universityNameInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("GPA: "));
    newBoxDiv.appendChild(gpaInput);

    newEducationDiv.appendChild(newTitle);
    newEducationDiv.appendChild(newBoxDiv);
    container.appendChild(newEducationDiv);
  }
</script>



<div class="edu-exp">
  <h1 class="heading" data-aos="fade-up"> <span>Experience</span> </h1>
  <div class="row">
    <div class="box-container" id="experience-container">
      <h3 class="title" data-aos="fade-right">Experience</h3>
      <div class="box" data-aos="fade-right">
        Start Year: <input type="text" placeholder="From year">
        <p>End Year: <input type="text" placeholder="To year"></p>
        <p>Employment: <input type="text" placeholder="Type of work"></p>
        <p>Name of organization: <input type="text" placeholder="Name of organization/institute"></p>
        <p>Position: <input type="text" placeholder="Position"></p>
      </div>
    </div>
  </div>

  <button onclick="addExperience()">Add Experience</button>
</div>

<script>
  function addExperience() {
    var container = document.getElementById("experience-container");
    var experienceCount = container.children.length;

    var newExperienceDiv = document.createElement("div");
    newExperienceDiv.classList.add("box-container");

    var newTitle = document.createElement("h3");
    newTitle.classList.add("title");
    newTitle.setAttribute("data-aos", "fade-right");
    newTitle.textContent = "Experience";

    var newBoxDiv = document.createElement("div");
    newBoxDiv.classList.add("box");
    newBoxDiv.setAttribute("data-aos", "fade-right");

    var startYearInput = document.createElement("input");
    startYearInput.type = "text";
    startYearInput.placeholder = "From year";

    var endYearInput = document.createElement("input");
    endYearInput.type = "text";
    endYearInput.placeholder = "To year";

    var employmentInput = document.createElement("input");
    employmentInput.type = "text";
    employmentInput.placeholder = "Type of work";

    var organizationInput = document.createElement("input");
    organizationInput.type = "text";
    organizationInput.placeholder = "Name of organization/institute";

    var positionInput = document.createElement("input");
    positionInput.type = "text";
    positionInput.placeholder = "Position";

    newBoxDiv.appendChild(document.createTextNode("Start Year: "));
    newBoxDiv.appendChild(startYearInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("End Year: "));
    newBoxDiv.appendChild(endYearInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("Employment: "));
    newBoxDiv.appendChild(employmentInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("Name of organization: "));
    newBoxDiv.appendChild(organizationInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(document.createTextNode("Position: "));
    newBoxDiv.appendChild(positionInput);

    newExperienceDiv.appendChild(newTitle);
    newExperienceDiv.appendChild(newBoxDiv);
    container.appendChild(newExperienceDiv);
  }
</script>



<div class="edu-exp">
  <h1 class="heading" data-aos="fade-up"> <span>Services</span> </h1>
  <div class="row">
    <div class="box-container" id="service-container">
      <h3 class="title" data-aos="fade-right">Service</h3>
      <div class="box" data-aos="fade-right">
        <p>Service topic: <input type="text" placeholder="Service"></p>
        <p data-aos="fade-up">
          <textarea placeholder="Summary of services in max 40 words" maxlength="40"></textarea>
        </p>
      </div>
    </div>
  </div>

  <button onclick="addService()">Add Service</button>
</div>

<script>
  function addService() {
    var container = document.getElementById("service-container");
    var serviceCount = container.children.length;

    var newServiceDiv = document.createElement("div");
    newServiceDiv.classList.add("box-container");

    var newTitle = document.createElement("h3");
    newTitle.classList.add("title");
    newTitle.setAttribute("data-aos", "fade-right");
    newTitle.textContent = "Service";

    var newBoxDiv = document.createElement("div");
    newBoxDiv.classList.add("box");
    newBoxDiv.setAttribute("data-aos", "fade-right");

    var serviceTopicInput = document.createElement("input");
    serviceTopicInput.type = "text";
    serviceTopicInput.placeholder = "Service";

    var summaryTextarea = document.createElement("textarea");
    summaryTextarea.placeholder = "Summary of services in max 40 words";
    summaryTextarea.maxLength = "40";

    newBoxDiv.appendChild(document.createTextNode("Service topic: "));
    newBoxDiv.appendChild(serviceTopicInput);
    newBoxDiv.appendChild(document.createElement("p")).appendChild(summaryTextarea);

    newServiceDiv.appendChild(newTitle);
    newServiceDiv.appendChild(newBoxDiv);
    container.appendChild(newServiceDiv);
  }
</script>

<form>
   <!-- Form fields here -->
   <input type="submit" value="Submit">
</form>




</body>
</html>