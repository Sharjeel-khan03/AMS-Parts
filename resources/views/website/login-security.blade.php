<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Security</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    .colors {
        color: blue;
    }

    .view-more:hover {
        color: blue;
        border-bottom: 1px solid blue;
    }

    .color-card {
        background-color: #e8e7ff;
    }

    .content {
        background: #d4d2d266;

    }

    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
        color: blue;
    }
    /* Add your custom CSS styles here */
  .modal-left {
    left: 0 !important;
    right: auto !important;
  }
</style>

<body class=" content">

  <div class="container">
    <h6><b>Login & Security</b></h6>
  
    <div class="card p-4">
      <p class="mb-0 pb-0"><b>Display Name:</b></p>
      <p class="mt-0 pt-0">Display Name <span><a href="#" class="edit-link" data-toggle="modal" data-target="#editModal"><b class="colors">EDIT</b></a></span></p>
  
      <p class="mt-4 mb-0 pb-0"><b>EMAIL:</b></p>
      <a href="#"><b class="color">Change Password</b></a>
  
      <p class="mt-4 mb-2"><b>Two-Step Authentication:</b></p>
      <p class="mt-0 pt-0">Enabling Two-Step Authentication will add a second level of security beyond your primary credentials when you log in to the DigiKey website. DigiKey provides various options from which you can choose to facilitate this, such as Email, SMS, and Google Authenticator.</p>
      <a href="#"><b class="color">Enable Two-Step Authentication</b></a>
    </div>
  </div>
  
  <!-- Modal HTML -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-left" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Name</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" id="newName" class="form-control" placeholder="Enter new name">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="saveButton">Save</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Handle save button click
    var saveButton = document.getElementById("saveButton");
    saveButton.addEventListener("click", function() {
      var newName = document.getElementById("newName").value;
      // You can perform further actions with the new name here, such as updating it on the server
      console.log("New name:", newName);
      $('#editModal').modal('hide'); // Close the modal
    });
  });
  </script>
  
  </body>
  </html>