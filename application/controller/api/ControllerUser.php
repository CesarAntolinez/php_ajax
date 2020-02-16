<?php

class ControllerUser {

    /**
     * Permite llamar a todos los usuarios
     */
    public function get()
    {
        //Atraer toda la información
        $data = file_get_contents( __DIR__ . '/data.json');
        $data = json_decode($data, true);
        return json_encode(['status' => true, 'data' => $data['data']]);
    }

    /**
     * Permite crear a un usuario
     */
    public function create()
    {
        //Atraer toda la información
        $data = file_get_contents( __DIR__ . '/data.json');
        $data = json_decode($data, true);

        try {
            //Agrega a lo ultimo de la informacion
            $input = [
                'id'    => $data['autoincrement'] + 1,
                'name'  => $_POST['name']
            ];
            array_push($data['data'], $input);
            $data['autoincrement'] += 1;

            //modifica el json
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents(__DIR__ . '/data.json', $data);

            return json_encode(['status' => true, 'message' => 'El usuario ' . $_POST['name'] . ' a sido agregado', 'method' => 'create', 'data' => $input]);
        }catch (Exception $e)
        {
            return json_encode(['status' => false, 'message' => 'El usuario ' . $_POST['name'] . ' no pudo ser agregado']);
        }

    }

    /**
     * Permite actualizar a un usuario
     * @return false|string
     */
    public function update()
    {
        //Atraer toda la información
        $data = file_get_contents( __DIR__ . '/data.json');
        $data = json_decode($data, true);

        try{
            //Buscar el usuario
            $position = array_search($_GET['id'], array_column($data['data'], 'id'));
            //Agrega a lo ultimo de la informacion
            $data['data'][$position] = [
                'id'    => $_GET['id'],
                'name'  => $_POST['name']
            ];
            $input = $data['data'][$position];
            //modifica el json
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents(__DIR__ . '/data.json', $data);

            return json_encode(['status' => true, 'message' => 'El usuario ' . $_POST['name'] . ' a sido modificado', 'method' => 'update', 'data' => $input]);
        }catch (Exception $exception)
        {
            return json_encode(['status' => false, 'message' => 'El usuario ' . $_POST['name'] . ' no pudo ser modificado']);
        }
    }

    /**
     * Permte borrar a n usuaio
     */
    public function delete()
    {
        //Atraer toda la información
        $data = file_get_contents( __DIR__ . '/data.json');
        $data = json_decode($data, true);

        try{
            //Buscar el usuario
            $position = array_search($_GET['id'], array_column($data['data'], 'id'));
            //Borrar el usuario
            $input = $data['data'][$position];
            unset($data['data'][$position]);
            //modifica el json
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents(__DIR__ . '/data.json', $data);
            return json_encode(['status' => true, 'message' => 'El usuario ' . $input['name'] . ' a sido eliminado', 'method' => 'update', 'data' => $input]);
        }catch (Exception $exception)
        {
            return json_encode(['status' => false, 'message' => 'El usuario ' . $input['name'] . ' no pudo ser eliminado']);
        }
    }




}