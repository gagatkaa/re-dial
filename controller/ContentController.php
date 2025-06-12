<?php

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
      ->toArray();

    shuffle($user_stories);
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

    if (!empty($_POST['action'])) {


      if ($_POST['action'] == 'add_story') {
        $story = new Story();
        $story->user_name = $_POST['user_name'];
        $story->usage_time = $_POST['usage_time'];
        $story->tool_used = $_POST['tool_used'];
        $story->impact = $_POST['impact'];
        // $story->consent_to_share = isset($_POST['consent_to_share']) ? 1 : 0;
        $story->consent_to_share = !empty($_POST['consent_to_share']) ? 1 : 0;



        $errors = $story->validate($story);

        if (empty($errors)) {

          $story->save();

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


    $user_stories = Story::where('consent_to_share', 1)
      ->orderBy('id', 'desc')
      ->get();

    $this->set('user_stories', $user_stories);

  }
  public function apiAddStory()
  {

    $result = $this->_handleInsertStoryForm();


    echo json_encode($result);
    exit();
  }


  private function _handleInsertStoryForm()
  {

    $newStory = new Story();
    $newStory->user_name = $_POST['user_name'];
    $newStory->usage_time = $_POST['usage_time'];
    $newStory->tool_used = $_POST['tool_used'];
    $newStory->impact = $_POST['impact'];
    $newStory->consent_to_share = !empty($_POST['consent_to_share']) ? 1 : 0;


    $errors = Story::validate($newStory);

    if (empty($errors)) {

      $newStory->save();
      return ['result' => 'ok', 'data' => $newStory->toArray()];
    } else {

      return ['result' => 'error', 'data' => $errors];
    }
  }

}


