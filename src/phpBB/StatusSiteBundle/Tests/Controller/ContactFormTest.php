<?php
namespace phpBB\StatusSiteBundle\Tests\Controller;

use phpBB\StatusSiteBundle\Form\ContactType;
use Symfony\Component\Form\Test\TypeTestCase;

class ContactFormTest extends TypeTestCase
{
    /**
     * @dataProvider getValidTestData
     */
    public function testSubmitValidData($formData)
    {
        $type = new ContactType();
        $form = $this->factory->create($type);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($form->getData(), $formData);

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
    
    public function getValidTestData()
    {
        return array(
            array(
                'formData' => array(
                    'email' => 'nub@phpbb.com',
                    'message' => 'test message',
                ),
            ),
        );
    }    
}