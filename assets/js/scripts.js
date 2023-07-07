// Redirection after 5 seconds
function redirectTo(page) {
  setTimeout(() => {
    window.location.href = page;
  }, 5000);
}

// Refresh the page after 5 seconds
function redirectToSamePage() {

  setTimeout(() => {
    // Get the current URL
    var currentUrl = window.location.href;

    // Redirect to the same page
    window.location.href = currentUrl;
  }, 5000);
}

// Redirect to a page after 5 seconds
document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('.redirect-to-login')) redirectTo('login.inc.php');
  if (document.querySelector('.redirect-to-register')) redirectTo('register.inc.php');
  if (document.querySelector('.redirect-to-teacher-landing')) redirectTo('teacherLanding.inc.php');
  if (document.querySelector('.redirect-to-student-landing')) redirectTo('studentLanding.inc.php');
  if (document.querySelector('.redirect-to-admin-landing')) redirectTo('adminLanding.inc.php');
  if (document.querySelector('.redirect-to-my-account')) redirectTo('myAccount.inc.php');
  if (document.querySelector('.redirect-to-same-page')) redirectToSamePage();
  
  const createOrderForm = document.getElementById('createOrderForm');
  // Validate the create order form
  if (createOrderForm) {
    // Prevent the form from submitting
    createOrderForm.addEventListener('submit', (event) => {
      if (!validateCreateOrderForm()) event.preventDefault();
    });
  }

  // Show or hide language selection based on role on the register page
  const roleElement = document.getElementById('role');
  const languageGroupElement = document.getElementById('language-group');

  // Show or hide the language selection based on the role
  if (roleElement && languageGroupElement) {
    roleElement.addEventListener('change', () => {
      // Show the language selection if the role is teacher
      languageGroupElement.style.display = roleElement.value === 'teacher' ? 'block' : 'none';
    });
  }
});

  // For My Account Page
  if (window.location.pathname.endsWith('myAccount.inc.php')) {
    // Store the initial data
    let initialData = {
      name: '',
      email: ''
    };
  
    // Retrieve initial data from form fields
    initialData.name = $('#name').val();
    initialData.email = $('#email').val();

    // Hide the update and cancel buttons
    $("#editButton").click(function() {
      $("input:not(#language)").prop("readonly", false);
      $("#updateButton, #cancelButton").show();
      $(this).hide();
    });

    $("#cancelButton").click(function() {
      $("input:not(#language)").prop("readonly", true);
      $('#name').val(initialData.name);
      $('#email').val(initialData.email);
      $('#password, #confirm_password').val('');
      $("#editButton").show();
      $("#updateButton, #cancelButton").hide();
    });

    // Validate the update account form
    $("#updateAccountForm").on('submit', function(e) {
      
      // Get the password and confirm password values
      let password = $("#password").val();
      let confirmPassword = $("#confirm_password").val();
      
      // If the user has entered a password, make sure they match
      if (password !== '' || confirmPassword !== '') {
        // If the passwords do not match, prevent the form from submitting
        if (password !== confirmPassword) {
          alert('Passwords do not match!');
          e.preventDefault();
        }
      }
      // Update the initial data with the new values
      initialData.name = $('#name').val();
      initialData.email = $('#email').val();
    });
  }

// Validate the create order form
function validateCreateOrderForm() {
  // Get the from and to languages
  const fromLanguage = document.getElementById('from_language').value;
  const toLanguage = document.getElementById('to_language').value;

  // If the from and to languages are the same, show an alert and return false
  if (fromLanguage === toLanguage) {
    alert('From and To languages cannot be the same.');
    return false;
  }
  // Otherwise, return true
  return true;
} 

// Show Container
function showContainer(containerId) {
  $('.container').removeClass('display-block').addClass('display-none');
  $('#' + containerId).removeClass('display-none').addClass('display-block');
}

// Show Student Edit Container
function showStudentEditContainer(studentId, studentName, studentEmail) {
 $('#student_id').val(studentId);
 $('#student_name').val(studentName);
 $('#student_email').val(studentEmail);
 $('#student_container').removeClass('display-block').addClass('display-none');
 $('#student_edit_container').removeClass('display-none').addClass('display-block');
}

// Show Teacher Edit Container
function showTeacherEditContainer(teacherId, teacherName, teacherEmail,teacherLanguage) {
$('#teacher_id').val(teacherId);
 $('#teacher_name').val(teacherName);
 $('#teacher_email').val(teacherEmail);
 $('#teacher_language').val(teacherLanguage);
 $('#teacher_container').removeClass('display-block').addClass('display-none');
 $('#teacher_edit_container').removeClass('display-none').addClass('display-block')
}

// Close Edit Section
function close_edit_section(section,parent_section) {
  $('#'+section).removeClass('display-block').addClass('display-none');
  $('#'+parent_section).removeClass('display-none').addClass('display-block');
}

// Save Student Data Changes
function saveStudentChanges() {
  // Get the updated values from the modal fields
  var updatedName = $('#editName').val();
  var updatedEmail = $('#editEmail').val();

  // Close the modal
  $('#editStudentModal').modal('hide');
}

// Delete Orders
function deleteOrder(id) {
  // Confirm before deleting the order
  if (confirm("Are you sure you want to delete this order?")) {
    // Send an AJAX request to delete the order
    $.ajax({
      url: 'adminLanding.inc.php',
      type: 'POST',
      data: {
          order_id: id
      },
      // Handle the success response (in admin_landing.tpl)
      success: function (response) {
          // Close the delete confirmation modal
          $('#order_tr_'+id).remove();
          $('#order_delete_alert').css('display','block');
      },
      // Handle the error response
      error: function (xhr, status, error) {
          console.log(xhr.responseText);
      }
    });
  }
}

// Handle Submit Form
function handleSubmitForm(e) {
  e.preventDefault();
  const form = document.querySelector('form');
  const successAlert = document.getElementById('success-alert');
  // Show success message
  successAlert.style.display = 'block';
  // Wait for 3 seconds before submitting the form
  setTimeout(() => form.submit(), 3000); 
}

$(document).ready(function () {
  // Show the success message on the order fulfillment page
  if (window.location.pathname.endsWith('orderFulfillment.inc.php')) {
    const form = document.querySelector('form');
    form.addEventListener('submit', handleSubmitForm);
  }

  // Show the success message on the teacher landing page
  if (window.location.pathname.endsWith('teacherLanding.inc.php')) {
    const successMessage = sessionStorage.getItem('success');
    if (successMessage) {
      sessionStorage.removeItem('success');
      alert(successMessage);
      location.reload();
    }
  }
  
});