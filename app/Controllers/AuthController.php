<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User;

class AuthController extends BaseController
{
  public function login()
  {
    $data['title'] = 'Login';
    return view('v_auth/login', $data);
  }

  public function login_process()
  {
    $validationRules = [
      'email' => [
        'label' => 'Email',
        'rules' => 'required|valid_email|max_length[255]',
        'errors' => [
          'required' => '{field} is required',
          'valid_email' => '{field} is not a valid email',
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} is required'
        ]
      ]
    ];

    // Validate input
    if (!$this->validate($validationRules)) {
      return redirect()->to(base_url('auth/login'))->withInput()->with('validation', $this->validator->getErrors());
    }

    // Get input data
    $data = [
      'email'     => $this->request->getPost('email'),
      'password'  => $this->request->getPost('password')
    ];

    // Get user by email
    $user = (new User())->where('email', $data['email'])->first();

    // Check if user exist
    if (!$user) {
      return redirect()->to(base_url('auth/login'))->with('error', 'Email or password incorrect!');
    }

    // Check if password is correct
    if (!password_verify((string) $data['password'], (string) $user['password'])) {
      return redirect()->to(base_url('auth/login'))->with('error', 'Email or password incorrect!');
    }

    // Set session if user is valid
    session()->set('isLoggedIn', true);
    session()->set('id', $user['id']);
    session()->set('role', $user['role']);

    return redirect()->to(base_url('/'));
  }

  public function register()
  {
    $data['title'] = 'Register';
    return view('v_auth/register', $data);
  }

  public function register_process()
  {
    $validationRules = [
      'name' => [
        'label' => 'Name',
        'rules' => 'required|max_length[255]',
        'errors' => [
          'required' => '{field} is required'
        ]
      ],
      'email' => [
        'label' => 'Email',
        'rules' => 'required|valid_email|max_length[255]|is_unique[users.email]',
        'errors' => [
          'required' => '{field} is required',
          'valid_email' => '{field} is not a valid email',
          'is_unique' => '{field} already registered'
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required|min_length[8]',
        'errors' => [
          'required' => '{field} is required',
          'min_length' => '{field} must be at least 8 characters'
        ]
      ],
      'password_confirm' => [
        'label' => 'Password Confirmation',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => '{field} is required',
          'matches' => '{field} does not match with password'
        ]
      ]
    ];

    // Validate input
    if (!$this->validate($validationRules)) {
      return redirect()->to(base_url('auth/register'))->withInput()->with('validation', $this->validator->getErrors());
    }

    // Get input data
    $data = [
      'name'      => $this->request->getPost('name'),
      'email'     => $this->request->getPost('email'),
      'password'  => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
      'role'      => 'user'
    ];

    // Insert user
    (new User())->save($data);
    return redirect()->to(base_url('auth/login'))->with('success', 'Register success! Please login');
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url('auth/login'));
  }

  public function redirect()
  {
    $role = session()->get('role');
    if ($role == 'admin') {
      return redirect()->to('/admin');
    } elseif ($role == 'user') {
      return redirect()->to('/user');
    }

    return redirect()->to('/auth/login');
  }
}
