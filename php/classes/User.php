<?php

class User
{
    private $conn;

    // =============================
    // CONSTRUCTOR
    // =============================
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // =============================
    // COMPROBAR SI EMAIL EXISTE
    // =============================
    public function emailExists($email)
    {
        $stmt = $this->conn->prepare(
            "SELECT id FROM usuarios WHERE email = ? LIMIT 1"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }

    // =============================
    // REGISTRO DE USUARIO
    // =============================
    public function register($name, $email, $password)
    {
        if ($this->emailExists($email)) {
            return [
                "success" => false,
                "message" => "El correo ya está registrado"
            ];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            return ["success" => true];
        }

        return [
            "success" => false,
            "message" => "Error al registrar usuario"
        ];
    }

    // =============================
    // LOGIN
    // =============================
    public function login($email, $password)
    {
        $stmt = $this->conn->prepare(
            "SELECT id, nombre, password FROM usuarios WHERE email = ? LIMIT 1"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user["password"])) {
            return [
                "success" => true,
                "user" => [
                    "id" => $user["id"],
                    "nombre" => $user["nombre"]
                ]
            ];
        }

        return [
            "success" => false,
            "message" => "Correo o contraseña incorrectos"
        ];
    }

    // =============================
    // VERIFICAR SESIÓN
    // =============================
    public function isLoggedIn()
    {
        return isset($_SESSION["user_id"]);
    }

    // =============================
    // CERRAR SESIÓN
    // =============================
    public function logout()
    {
        session_unset();
        session_destroy();
    }

    // =============================
    // OBTENER DATOS DEL USUARIO (SESIÓN)
    // =============================
    public function getUserData()
    {
        if (!$this->isLoggedIn()) {
            return null;
        }

        $stmt = $this->conn->prepare(
            "SELECT id, nombre, email FROM usuarios WHERE id = ? LIMIT 1"
        );
        $stmt->bind_param("i", $_SESSION["user_id"]);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // =============================
    // OBTENER USUARIO POR ID (API)
    // =============================
    public function getById($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT id, nombre, email FROM usuarios WHERE id = ? LIMIT 1"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}