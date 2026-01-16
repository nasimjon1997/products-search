# Product Search API

Простое REST API для поиска и фильтрации товаров на Laravel 11/12.

## Возможности

- Поиск по названию товара (частичный, без учета регистра)
- Фильтры:
  - Диапазон цен (`price_from`, `price_to`)
  - Категория (`category_id`)
  - Наличие на складе (`in_stock`)
  - Минимальный рейтинг (`rating_from`)
- Сортировка:
  - `price_asc` — по возрастанию цены
  - `price_desc` — по убыванию цены
  - `rating_desc` — по убыванию рейтинга
  - `newest` — по дате создания (по умолчанию)
- Пагинация (по умолчанию 12 элементов на страницу)

## Технологии

- Laravel 11 / 12
- PHP 8.2+
- MySQL / PostgreSQL / SQLite

## Установка

```bash
# 1. Клонируем репозиторий
git clone git@github.com:nasimjon1997/products-search.git
cd product-search-api

# 2. Устанавливаем зависимости
composer install

# 3. Копируем .env и настраиваем
cp .env.example .env

# 4. Генерируем ключ приложения
php artisan key:generate

# 5. Запускаем Laravel Sail (рекомендуется)
php up -d

# 6. Выполняем миграции и сиды
php artisan migrate --seed
