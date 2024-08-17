<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class RequestHandlerComponent extends Component
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @param array $config The configuration settings provided to this component.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Custom initialization logic if required
    }

    /**
     * Detect the type of the request (for example, JSON, XML).
     *
     * @param string $type The content type to check for.
     * @return bool
     */
    public function is($type)
    {
        $request = $this->getController()->getRequest();
        return $request->is($type);
    }

    /**
     * Respond with JSON data.
     *
     * @param mixed $data The data to respond with.
     * @return \Cake\Http\Response
     */
    public function respondAsJson($data)
    {
        $controller = $this->getController();
        $controller->set(['data' => $data]);
        $controller->viewBuilder()->setOption('serialize', 'data');
        return $controller->getResponse()->withType('application/json');
    }

    /**
     * Check if the request is AJAX.
     *
     * @return bool
     */
    public function isAjax()
    {
        return $this->is('ajax');
    }
}
