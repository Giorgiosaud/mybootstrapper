<?php

namespace spec\Bootstrapper;

use Collective\Html\HtmlBuilder;
use Mockery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormSpec extends ObjectBehavior
{
    function let()
    {
        $url = Mockery::mock('Illuminate\Routing\UrlGenerator');
        $url->shouldReceive('current')->andReturn('foo');
        $token = "foo";
        $view = Mockery::mock('Illuminate\Contracts\View\Factory');

        $this->beConstructedWith(new HtmlBuilder($url, $view), $url, $view, $token);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bootstrapper\Form');
        // Since it should extend...
        $this->shouldHaveType('Collective\Html\FormBuilder');
    }

    /**
     * Sanity check!
     */
    function it_can_close_the_form()
    {
        $this->close()->__toString()->shouldBe("</form>");
    }

    /**
     * More sanity checks!
     */
    function it_can_open_a_form()
    {
        $this->open()->__toString()->shouldBe(
            '<form method="POST" action="foo" accept-charset="UTF-8"><input name="_token" type="hidden" value="foo">'
        );
    }

    function it_can_open_an_inline_form()
    {
        $this->inline()->__toString()->shouldBe(
            '<form method="POST" action="foo" accept-charset="UTF-8" class="form-inline"><input name="_token" type="hidden" value="foo">'
        );

        $this->inline(['class' => 'option'])->__toString()->shouldBe(
            '<form method="POST" action="foo" accept-charset="UTF-8" class="form-inline option"><input name="_token" type="hidden" value="foo">'
        );
    }

    function it_can_open_a_horizontal_form()
    {
        $this->horizontal()->__toString()->shouldBe(
            '<form method="POST" action="foo" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="foo">'
        );

        $this->horizontal(['class' => 'option'])->__toString()->shouldBe(
            '<form method="POST" action="foo" accept-charset="UTF-8" class="form-horizontal option"><input name="_token" type="hidden" value="foo">'
        );
    }

    function it_can_show_validation()
    {
        $validations = ['success', 'warning', 'error'];

        foreach ($validations as $validation) {
            $this->$validation(
                '<div>label</div>',
                '<div>input</div>'
            )->shouldBe(
                "<div class='form-group has-{$validation}'><div>label</div><div>input</div></div>"
            );
            $this->$validation(
                '<div>label</div>',
                '<div>input</div>',
                ['class' => 'foo']
            )->shouldBe(
                "<div class='form-group has-{$validation} foo'><div>label</div><div>input</div></div>"
            );
            $this->$validation(
                '<div>label</div>',
                '<div>input</div>',
                ['foo' => 'bar']
            )->shouldBe(
                "<div foo='bar' class='form-group has-{$validation}'><div>label</div><div>input</div></div>"
            );
        }
    }

    function it_can_show_feedback()
    {
        $this->feedback(
            '<div>label</div>',
            '<div>input</div>',
            'foo'
        )->shouldBe(
            "<div class='form-group has-feedback'><div>label</div><div>input</div><span class='glyphicon glyphicon-foo form-control-feedback'></span></div>"
        );

        $this->feedback(
            '<div>label</div>',
            '<div>input</div>',
            'foo',
            ['class' => 'foo']
        )->shouldBe(
            "<div class='form-group has-feedback foo'><div>label</div><div>input</div><span class='glyphicon glyphicon-foo form-control-feedback'></span></div>"
        );

        $this->feedback(
            '<div>label</div>',
            '<div>input</div>',
            'foo',
            ['bar' => 'foo']
        )->shouldBe(
            "<div bar='foo' class='form-group has-feedback'><div>label</div><div>input</div><span class='glyphicon glyphicon-foo form-control-feedback'></span></div>"
        );
    }

    function it_can_show_help_blocks()
    {
        $this->help('foo')->shouldBe("<span class='help-block'>foo</span>");
        $this->help('foo', ['class' => 'foo'])->shouldBe(
            "<span class='help-block foo'>foo</span>"
        );
        $this->help('foo', ['data-class' => 'foo'])->shouldBe(
            "<span data-class='foo' class='help-block'>foo</span>"
        );
    }

    function it_can_be_given_a_model()
    {
        $types = [
            'horizontalModel' => '<form method="POST" action="foo" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="foo">',
            'inlineModel' => '<form method="POST" action="foo" accept-charset="UTF-8" class="form-inline"><input name="_token" type="hidden" value="foo">'
        ];
        foreach ($types as $type => $expected) {
            $this->$type(new Foo())->__toString()->shouldBe($expected);
        }
    }

    function it_can_show_input()
    {
        $types = [
            'text' => 'text',
            'email' => 'email',
            'datetime' => 'datetime',
            'datetimelocal' => 'datetime-local',
            'date' => 'date',
            'month' => 'month',
            'time' => 'time',
            'week' => 'week',
            'number' => 'number',
            'url' => 'url',
            'search' => 'search',
            'tel' => 'tel',
            'color' => 'color'
        ];
        foreach ($types as $type => $expected) {
            $this->$type('foo', 'bar', ['class' => 'baz'])->__toString()->shouldBe(
                '<input class="form-control baz" name="foo" type="' . $expected . '" value="bar">'
            );
            $this->$type('foo', 'bar')->__toString()->shouldBe(
                '<input class="form-control" name="foo" type="' . $expected . '" value="bar">'
            );
        }
    }

    function it_can_show_password()
    {
        $this->password('foo', ['class' => 'baz'])->__toString()->shouldBe(
            '<input class="form-control baz" name="foo" type="password" value="">'
        );
    }

    function it_overrides_the_label_method()
    {
        $this->label('foo')->__toString()->shouldBe(
            '<label for="foo" class="control-label">Foo</label>'
        );
        $this->label('foo', 'bar')->__toString()->shouldBe(
            '<label for="foo" class="control-label">bar</label>'
        );
    }

    function it_overrides_the_submit_method()
    {
        $this->submit('foo')->__toString()->shouldBe(
            '<input class="btn btn-default" type="submit" value="foo">'
        );
    }

    function it_can_get_validation_errors()
    {
        $messageBag = Mockery::mock('Illuminate\\Support\\MessageBag', function($mock) {
            $mock->shouldReceive('has')->with('foo')->andReturn(true);
            $mock->shouldReceive('first')->once()->andReturn('bar');
        });
        $session = Mockery::mock('Illuminate\\Session\\Store', function($mock) use ($messageBag) {
            $mock->shouldReceive('has')->with('errors')->andReturn(true);
            $mock->shouldReceive('get')->with('errors')->andReturn($messageBag);
        });

        $this->setSessionStore($session);

        $this->hasErrors('foo')->shouldBe(true);
        $this->getFormattedError('foo')->shouldBe('bar');
    }
}

class Foo
{
}
