# Full-Stack Development

<h3><b>Описание проекта:</b></h3>

<p>Данный сайт - это копия сервиса обмена электронных валют btc-e.com, с модернизацией под тех. задание заказчика.</p>

<p>Front-End (html, css, javascript, jquery, ajax)</p>

<ul>
	<li>Подключение и настройка системы графиков jqplot.com</li>
	<li>Переключение режима показа графиков (за месяц, за день)</li>
	<li>Переключение графиков по нажатию на них</li>
	<li>Анимация и визуальное оформление графиков</li><br>
	<li>Админка сайта для первоначального запуска с указанием входных данных (/adminka)</li>
	<li>Обработка и отправка входных данных на Back-side</li><br>
	<li>Разработка и валидация форм регистрации, авторизации, восстановление доступа, саппорт</li><br>
	<li>Обработка и настройка всех страниц сайта</li>
	<li>Настройка страниц 19 валютных пар (таблицы, секции сделок)</li>
	<li>Настройка страниц личного кабинета пользователей</li>
</ul><br>

<p>Back-End  (php, mysql)</p><br>

<ul>
	<li>Регистрация пользователей (использование капчи)</li>
	<li>Подтверждение E-mail</li>
	<li>Авторизация (на сессиях)</li>
	<li>Восстановление доступа</li><br>
	<li>Личный кабинет пользователей (вывод данных)</li>
	<li>Вывод данных по сделкам и ордерам в таблицы валютных пар</li><br>
	<li>Скрипт генерации виртуальных сделок в диапазоне -+24 часа</li>
	<li>Скрипт генерации дневных свечей в диапазоне - 30 дней назад</li>
	<li>Скрипт генерации дневной свечи по итогам сделок за прошедшие сутки</li>
	<li>Запись сделок в файлы из базы для подключения к графикам</li>
	<li>Скрипт проведения реальных сделок и создания ордеров, включая проверки по авторизации и балансу пользователей</li><br>
	<li>Настройка Crontab (генерация дневных и часовых свечей)</li><br>
</ul>
<p>В итоге:</p><br>
<p>Написано несколько сотен строк на javascript и несколько тысяч строк на php.</p>
