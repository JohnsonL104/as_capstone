<?php include('../includes/front/top.php'); 
include("../includes/models/lucas.php");
if (!isset($_SESSION['ADMIN']['ADMINID'])) {
    redirect("login");
}

?>
<?php $levels = 1;
include 'includes/front/header.php'; 
?>
<script src="https://kit.fontawesome.com/4933cad413.js" crossorigin="anonymous"></script>
<link rel ="stylesheet" href = "main_lucas.css">
<form id = "profileForm" data-id = "<?=(isset($user)) ? $user->user_id : "";?>">
        <div class="form-group">
            <label>First name:</label>
            <input type = "text" name = "firstName" id = "firstName" value = "<?= (isset($user)) ? $user->fname : ""?>">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type = "text" name = "lastName" id = "lastName" value = "<?= (isset($user)) ? $user->lname : ""?>">
        </div>
        <div class="form-group">
            <label>Student ID:</label>
            <input type = "text" name = "studentID" id = "studentID" value = "<?= (isset($user)) ? $user->student_id : ""?>">
        </div>
        <div class="form-group">
            <label>Phone Number:</label>
            <input type="tel" id="phone" name="phone" title="Phone Number" value = "<?= (isset($user)) ? $user->phone : ""?>">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type = "email" name = "email" id = "email" value = "<?= (isset($user)) ? $user->email : ""?>" >
        </div>
        


    </form>
    <div id = "saveBtnWrapper">
    <button class = "btn btn-secondary" id="saveBtn">Save Changes</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src = "../includes/models/lucas.js"></script>
<?php include 'includes/front/footer.php'; ?>
<script>
    var backBtn = document.querySelector("#backBtn");
    var saveBtn = document.querySelector("#saveBtn");
    var form = document.querySelector("#profileForm")
    var firstName = document.querySelector("#firstName");
    var lastName = document.querySelector("#lastName");
    var studentID = document.querySelector("#studentID");
    var phone = document.querySelector("#phone");
    var email = document.querySelector("#email");
    
    

    var phoneR = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
    var emailR = new RegExp(  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)


    phone.setCustomValidity("Please enter propper phone number Ex. 4015555555");
    email.setCustomValidity("Please enter propper email Ex. email@email.com");
    backBtn.classList.remove("btn-hidden")

    backBtn.addEventListener("click", function(e){
        window.location.replace("index.php")
    })

    saveBtn.addEventListener("click", function(e){
        if(!phoneR.test(phone.value)){
            phone.reportValidity();
        }
        else if(!emailR.test(email.value)){
            email.reportValidity();
        }
        else{
            user = new User(profileForm.dataset["id"], email.value, firstName.value, lastName.value, phone.value, studentID.value)
            user.updateUser();
        }
        
    })

    
</script>