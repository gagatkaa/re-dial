<?php
// Include the base Controller class and the Pizza model
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/Story.php';

class StoryController extends Controller
{
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
                $story->consent_to_share = isset($_POST['consent_to_share']) ? 1 : 0;




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
    public function apiAddStory()
    {
        // Call private helper that does all the logic
        $result = $this->_handleInsertStory();

        // Send the result back as JSON
        echo json_encode($result);
        exit(); // stop further execution
    }

    // Reusable method to handle insertion logic (shared by apiCreate & optionally others)
    private function _handleInsertStory()
    {
        // Create new pizza instance from POST data
        $newStory = new Story();
        $newStory->user_name = $_POST['user_name'];
        $newStory->usage_time = $_POST['usage_time'];
        $newStory->tool_used = $_POST['tool_used'];
        $newStory->impact = $_POST['impact'];
        $newStory->consent_to_share = $_POST['consent_to_share'];
        $newStory->submitted_at = $_POST['submitted_at'];

        // Validate data
        $errors = Story::validate($newStory);

        if (empty($errors)) {
            // Save pizza and return as array (likely used for frontend display)
            $newStory->save();
            return ['result' => 'ok', 'data' => $newStory->toArray()];
        } else {
            // Return errors in a structured format
            return ['result' => 'error', 'data' => $errors];
        }
    }
}
