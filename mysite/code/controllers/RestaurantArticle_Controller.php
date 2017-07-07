<?php

class RestaurantArticle_Controller
{
    public function CommentForm()
    {
        $myForm = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Name', '')
                    ->setAttribute('placeholder', 'Name*'),
                EmailField::create('Email', '')
                    ->setAttribute('placeholder', 'Email*'),
                TextareaField::create('Comment', '')
            ),
            FieldList::create(
                FormAction::create('handleComment', 'Post Comment')
            ),
            RequiredFields::create('Name', 'Email', 'Comment')
        );

        return $myForm;
    }

//    public function sendCommentForm($data, $form)
//    {
//        $name = $data['Name'];
//        $email = $data['Email'];
//        $message = $data['Comment'];
//        if (strlen($message) < 10) {
//            $form->addErrorMessage('YourMessage', 'Your message is too short', 'bad');
//            return $this->redirectBack();
//        }
//
//        return $this->redirect('/');
//    }

}