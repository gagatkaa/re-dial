<?php
// Include the base Controller class and the Pizza model
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/Content.php';

class ContentController extends Controller
{
  public function home()
  {

  }
  public function challengeCTA()
  {

  }
}
// // Renders the home/configure page and handles standard form submissions
// public function home()
// {
//   // Check if a POST request was made and the form was submitted
//   if (!empty($_POST['action'])) {

//     // Check which form was submitted based on the 'action' field
//     if ($_POST['action'] == 'add_pizza') {
//       // Create new pizza instance
//       $pizza = new Pizza();
//       $pizza->name = $_POST['name'];
//       $pizza->description = $_POST['description'];
//       $pizza->price = $_POST['price'];
//       $pizza->image = $_POST['image'];

//       // Validate the pizza
//       $errors = $pizza->validate($pizza);

//       if (empty($errors)) {
//         // Save pizza if valid
//         $pizza->save();

//         // Redirect to convert POST to GET (PRG pattern)
//         header('Location:index.php?page=configure');
//         exit();
//       } else {
//         // Pass validation errors to the view
//         $this->set('errors', $errors);
//       }
//     }
//   }

//   // Fetch all pizzas ordered by newest first
//   $pizzas = Pizza::orderby('id', 'desc')->get();
//   $this->set('pizzas', $pizzas); // pass to view
// }

// // Handles AJAX (JS) pizza creation
// public function apiCreate()
// {
//   // Call private helper that does all the logic
//   $result = $this->_handleInsertPizza();

//   // Send the result back as JSON
//   echo json_encode($result);
//   exit(); // stop further execution
// }

// // Reusable method to handle insertion logic (shared by apiCreate & optionally others)
// private function _handleInsertPizza()
// {
//   // Create new pizza instance from POST data
//   $newPizza = new Pizza;
//   $newPizza->name = $_POST['name'];
//   $newPizza->description = $_POST['description'];
//   $newPizza->price = $_POST['price'];
//   $newPizza->image = $_POST['image'];

//   // Validate data
//   $errors = Pizza::validate($newPizza);

//   if (empty($errors)) {
//     // Save pizza and return as array (likely used for frontend display)
//     $newPizza->save();
//     return ['result' => 'ok', 'data' => $newPizza->toArray()];
//   } else {
//     // Return errors in a structured format
//     return ['result' => 'error', 'data' => $errors];
//   }
// }

