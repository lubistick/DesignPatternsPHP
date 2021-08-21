<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Renderers;

/**
 * Отрисовщик шаблонов PHPTemplate. Оговорюсь, что эта реализация очень простая,
 * если не примитивная. В реальных проектах используйте `eval` с
 * осмотрительностью, т.к. неправильное использование этой функции может
 * привести к дырам безопасности.
 */
class PHPRenderer implements Renderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        extract($arguments, EXTR_OVERWRITE);

        ob_start();
        eval(' ?>' . $templateString . '<?php ');

        return ob_get_clean();
    }
}
