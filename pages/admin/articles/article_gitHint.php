<?php

?>

<H1>Использование системы контороля версий</H1>

<pre>

git config --list – проверка настроек

//предварительные настройки
git config --global user.name "ghSunural"
git config --global user.email ysunural@yandex.ru
git config --global core.quotepath off 
//Для unicode

$ git init //создать репозиторий из существующей папки


    ОБЫЧНЫЕ ДЕЙСТВИЯ
//Добавление коммита
git status //проверка состояния репозитория
//добавить конкретный файл
git add filename.ext
    //или
//добавить все недобавеленные файлы
// Обратите внимание на точку, это указание текущей директории и всех поддиректорий
git add .

//Восстановление удалённого файла
//Если вы случайно удалили файл, его можно быстро восстановить:
git checkout myfile.txt


git commit -m "first commit можно на русском"
//создать удаленный репозиторий
git remote add origin https://github.com/you_repository/you_project
(git remote add origin https://github.com/ghSunural/Silver-Hoof.git например)

git remote add origin https://github.com/ghSunural/learn_examp.git

    // отослать в репозиторий в ветку мастер
git push -u origin master
    //отправить на нужную ветку
$ git push -u origin название_ветки

    //РАБОТА С ВЕТКАМИ

$ git branch – список веток/посмотреть на какой ты ветке
$ git branch -a – список веток вместе с удаленным репозиторием

//создать ветку
$ git branch branchName
//перейти на ветку
$ git checkout branchName



    //FTP
git config git-ftp.url "ftp://files.000webhost.com/public_html"
git config git-ftp.user "spplab"
git config git-ftp.password "Malakhov6503682274"

git ftp init
git commit -m "Add new content"
git ftp push



nothing to commit (working directory clean)
Команда проверки состояния сообщит, что коммитить нечего.
Это означает, что в репозитории хранится текущее состояние рабочего каталога,
и нет никаких изменений, ожидающих записи.

git log получение списка произведенных изменений

git revert HEAD --no-edit // отмена коммита

git reset – отмена индексации измеений




git clone https://github.com/ghSunural/Silver-Hoof.git - клонирование с хаба

Например, если вы хотите извлечь (fetch) всю информацию, которая есть в репозитории Павла,
    но нет в вашем, вы можете выполнить

git fetch pb:
Данная команда связывается с указанным удалённым проектом и забирает все те данные проекта, которых у вас ещё нет.

git fetch origin извлекает все наработки, отправленные (push) на этот сервер после того, как вы склонировали его (или получили изменения с помощью fetch).

$ git push origin master
отправить вашу ветку master на сервер origin

$ git pull origin master
забрать с удаленного репозитория и объединить автоматически (в отличие от featch)

git remote rename, это изменит сокращённое имя, используемое для удалённого репозитория. Например, если вы хотите переименовать pb в paul, вы можете сделать это следующим образом:
$ git remote rename oldName newName


// РАБОТА НАД ОТДЕЛЬНОЙ ВЕТКОЙ

//создать ветку
$ git branch branchName
//перейти на ветку
$ git checkout branchName

//или
//создать ветку и сразу перейти на нее переключиться на ветку iss53 (ошибка 53)
$ git checkout -b iss53

$ git checkout master – переключиться на ветку / убедится что на ветке мастера

!!!!перейти на ту ветку, в которую вы хотите слить свои изменения, и выполнить команду git merge:
$ git checkout master
$ git merge iss53


</pre>






<script>

</script>


<style>



</style>

