<?php
// Include the base Controller class and the Pizza model
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/Content.php';
require_once __DIR__ . '/../model/Story.php';


class ContentController extends Controller
{
  public function home()
  {
    $user_stories = Story::where('consent_to_share', 1)
      ->orderBy('id', 'desc')
      ->get()
      ->toArray(); // Convert Eloquent collection to array

    shuffle($user_stories); // Randomize
    $preview_stories = array_slice($user_stories, 0, 3); // Get 3

    $this->set('user_stories', $preview_stories);
  }

  public function challengeCTA()
  {

  }
  public function tool1()
  {

  }
  public function tool2()
  {

  }
  public function tool3()
  {

  }
  public function form()
  {
    // check if the form was submitted
    if (!empty($_POST['action'])) {

      // check which form was submitted
      if ($_POST['action'] == 'add_story') {
        $story = new Story();
        $story->user_name = $_POST['user_name'];
        $story->usage_time = $_POST['usage_time'];
        $story->tool_used = $_POST['tool_used'];
        $story->impact = $_POST['impact'];
        // $story->consent_to_share = isset($_POST['consent_to_share']) ? 1 : 0;
        $story->consent_to_share = !empty($_POST['consent_to_share']) ? 1 : 0;
        echo $_POST['consent_to_share'];
        echo isset($_POST['consent_to_share']);

        //validate
        $errors = $story->validate($story);

        if (empty($errors)) {
          //insert the new pizza
          $story->save();

          //redirect to convert post to get
          header('Location:index.php?page=stories');

          exit();
        } else {
          $this->set('errors', $errors);
        }
      }
    }

    $user_stories = Story::orderby('id', 'desc')->get();
    $this->set('user_stories', $user_stories);

  }
  public function stories()
  {

    // Fetch only public (consent given) stories
    $user_stories = Story::where('consent_to_share', 1)
      ->orderBy('id', 'desc')
      ->get();

    $this->set('user_stories', $user_stories);

  }
  public function apiAddStory()
  {
    // Call private helper that does all the logic
    $result = $this->_handleInsertStoryForm();

    // Send the result back as JSON
    echo json_encode($result);
    exit(); // stop further execution
  }

  // Reusable method to handle insertion logic (shared by apiCreate & optionally others)
  private function _handleInsertStoryForm()
  {

    $newStory = new Story();
    $newStory->user_name = $_POST['user_name'];
    $newStory->usage_time = $_POST['usage_time'];
    $newStory->tool_used = $_POST['tool_used'];
    $newStory->impact = $_POST['impact'];
    $newStory->consent_to_share = !empty($_POST['consent_to_share']) ? 1 : 0;

    // Validate data
    $errors = Story::validate($newStory);

    if (empty($errors)) {

      $newStory->save();
      return ['result' => 'ok', 'data' => $newStory->toArray()];
    } else {

      return ['result' => 'error', 'data' => $errors];
    }
  }

}


