<?php
class LogoutController
{
  public function index()
  {
    if (isset($_SESSION['user'])) {
      removeSession('user');
      header('location:./');
    }
  }
}
