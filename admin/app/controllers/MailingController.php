<?php

require_once APP . '/models/Mailer.php';
require_once APP . '/models/Posts.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailingController
 *
 * @author abrah
 */
class MailingController extends Controller {

    public function actionMessages() {

        $posts = [];
        $posts = Posts::getPostList('mail', $_SESSION['user']['id']);
        require_once APP . '/views/mailing/grid.php';
        return true;
    }

    public function actionMessageView($alias, $id) {

        $mail = Posts::getPostById($id);
        require_once APP . '/views/mailing/messageView.php';
        return true;
    }

    public function actionNew() {

        $emails = User::getEmailList();

        if (isset($_POST['submit'])) {

            $error = false;
            $success = false;

            $subject = $_POST['subject'];
            $text = $_POST['editor1'];

            if (empty($subject) || empty($text)) {

                $error = error("Subject and message are required.");
            }
            if ($error == false) {

                $sent = Mailer::sendMail($emails, $subject, $text);

                if ($sent) {
                    $success = success("Mail has been sent.");
                    $options = ['title' => $subject, 'content' => $text, 'descript' => '', 'type' => 'mail'];
                    Posts::addPost($options);
                } else {
                    $error = error("Mail has not been sent.");
                }
            }
        }

        require_once APP . '/views/mailing/new.php';
        return true;
    }

    public function actionMessageDelete($alias, $action, $id) {

        if ($id) {
            Posts::Remove($id);
        }
        $posts = Posts::getPostList('mail', $_SESSION['user']['id']);
        require_once APP . '/views/mailing/grid.php';
        return true;
    }

    public function actionLastNews() {

        require_once APP . '/models/Mailing.php';


        if (isset($_POST['submit'])) {

            $emails = User::getEmailList();
            $text = $_POST['editor1'];
            $subject = "Test";

            $sent = Mailer::sendMail($emails, $subject, $text);

            if ($sent) {
                $success = success("Mail has been sent.");
                $options = ['title' => $subject, 'content' => $text, 'descript' => '', 'type' => 'mail'];
                Posts::addPost($options);
            } else {
                $error = error("Mail has not been sent.");
            }
        }



        $lastArticles = Mailing::getLastPost(5, 'articles');

        $lastBlog = Mailing::getLastPost(3, 'blog');

        $teenagers = Mailing::getLastPost(3, 'teenagers');

        $announcements = Mailing::getLastPost(3, 'announcements');

        require_once APP . '/views/mailing/lastNews.php';
        return true;
    }

}
