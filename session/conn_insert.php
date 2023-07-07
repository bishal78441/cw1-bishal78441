<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "formuser";
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn){
    die ("CONNECTION error: " . mysqli_connect_error());
} else {
    echo "Db Connected successfully";
}


// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$contactNumber = $_POST['contact_number'];
$age = $_POST['age'];
$experienceYears = $_POST['experience_years'];
$frontPageSummary = $_POST['front_page_summary'];
$biographySummary = $_POST['biography_summary'];
$skill1 = $_POST['skill1'];
$skill1Percentage = $_POST['skill1_percentage'];
$skill2 = $_POST['skill2'];
$skill2Percentage = $_POST['skill2_percentage'];
$educationStartYear = $_POST['education_start_year'];
$educationEndYear = $_POST['education_end_year'];
$educationType = $_POST['education_type'];
$educationName = $_POST['education_name'];
$educationGPA = $_POST['education_gpa'];
$experienceStartYear = $_POST['experience_start_year'];
$experienceEndYear = $_POST['experience_end_year'];
$employmentType = $_POST['employment_type'];
$organizationName = $_POST['organization_name'];
$position = $_POST['position'];
$serviceTopic = $_POST['service_topic'];
$serviceSummary = $_POST['service_summary'];


// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO user_data (image, name, email, address, contact_number, age, experience_years, front_page_summary, biography_summary, skill1, skill1_percentage, skill2, skill2_percentage, education_start_year, education_end_year, education_type, education_name, education_gpa, experience_start_year, experience_end_year, employment_type, organization_name, position, service_topic, service_summary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("bsssissssisiiissssiis", $image, $name, $email, $address, $contactNumber, $age, $experienceYears, $frontPageSummary, $biographySummary, $skill1, $skill1Percentage, $skill2, $skill2Percentage, $educationStartYear, $educationEndYear, $educationType, $educationName, $educationGPA, $experienceStartYear, $experienceEndYear, $employmentType, $organizationName, $position, $serviceTopic, $serviceSummary);

// Read the image file
$image = file_get_contents($_FILES['image']['tmp_name']);

$stmt->send_long_data(0, $image); // Bind the image data as a BLOB

$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the form page or display a success message
header("Location: insert.php");
exit();
?>
