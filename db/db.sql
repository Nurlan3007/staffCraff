
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, '3D графика'),
(2, 'Crypto/NFT'),
(3, 'Арт / Иллюстрации / Анимация'),
(4, 'Архитектура / предметы интерьера'),
(5, 'Аутсорсинг / Консалтинг / Менеджмент'),
(6, 'Бытовые услуги / Обучение'),
(7, 'Веб разработка'),
(8, 'Видео'),
(9, 'Графический дизайн'),
(10, 'Инженерия'),
(11, 'Интернет продвижение и реклама'),
(12, 'Классическая реклама и маркетинг'),
(13, 'Музыка / Звук'),
(14, 'Направления отраслевого Дизайна'),
(15, 'Переводы'),
(16, 'Программирование и IT'),
(17, 'Тексты'),
(18, 'Фотография');

-- --------------------------------------------------------

--
-- Структура таблицы `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint UNSIGNED NOT NULL,
  `topic` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `resume_category_id` bigint UNSIGNED NOT NULL,
  `resume_user_id` bigint UNSIGNED NOT NULL,
  `path_img` varchar(120) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `resumes`
--

INSERT INTO `resumes` (`id`, `topic`, `description`, `resume_category_id`, `resume_user_id`, `path_img`, `date`) VALUES
(5, 'C++ Programmer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam deserunt distinctio dolor excepturi, ipsa magnam molestias natus, officia quis saepe tempora, temporibus voluptatibus. Debitis ea ex illo, natus totam velit? A aliquid cupiditate, delectus ducimus et ex fugit harum ipsa laudantium maxime molestiae natus nemo numquam quasi quo quos repellat sequi temporibus unde ut! Alias eum excepturi modi numquam officia qui, vel veniam voluptas. Aliquam aliquid animi atque beatae blanditiis dicta ea enim exercitationem expedita ipsa libero maxime molestias, odit officia omnis, quasi quia reiciendis sapiente sed suscipit tempore veniam veritatis voluptas. Aut commodi cupiditate ducimus ea est exercitationem fuga fugiat inventore provident repellat rerum, ut voluptatibus voluptatum! A, accusamus accusantium ad alias aliquam aspernatur assumenda autem corporis, dicta dignissimos distinctio dolorum eos esse est eum id incidunt ipsa maiores nihil nisi nobis numquam officiis omnis pariatur placeat porro praesentium quam, quis quo quos sit tempora tenetur ullam. Dolore earum ipsa laboriosam maxime rem repellendus reprehenderit sed. Ab cupiditate dicta id ipsa ipsam molestiae natus, nisi, nostrum nulla, numquam possimus quam repellendus similique tempora voluptate. Accusantium atque corporis ducimus, et fuga illum inventore iure magni molestiae molestias obcaecati quae quibusdam, rem repellat sapiente, suscipit veritatis? Debitis nulla officia vitae!', 16, 1, 'Снимок экрана 2023-09-23 224220.png', '2023-10-31 11:33:53'),
(6, 'Php Programmer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab deserunt dolor facilis harum quaerat! Architecto, consectetur consequatur culpa eaque exercitationem fuga inventore ipsam iusto \r\n\r\nmolestias necessitatibus obcaecati pariatur porro praesentium quis repellendus saepe sint unde veritatis voluptatem voluptatibus. \r\n   Ducimus inventore minus mollitia nesciunt quos repellendus sequi suscipit tenetur vero voluptas!', 16, 3, '', '2023-10-31 11:39:32'),
(7, 'Web Designer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores assumenda cum dolore ea eaque esse est harum, iste itaque magnam minus nesciunt non perferendis ratione recusandae veritatis voluptas voluptatum!\r\n   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores assumenda cum dolore ea eaque esse est harum, iste itaque magnam minus nesciunt non perferendis ratione recusandae veritatis voluptas voluptatum!', 7, 6, '', '2023-10-31 12:00:39'),
(8, 'Big Data Analytic', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut beatae cupiditate, enim facilis iusto nemo provident quam quas repellendus ut vero? Dolore maiores odit optio similique. Ad animi beatae corporis dolore, ducimus fugit, labore modi\r\n molestiae nisi obcaecati odio odit officia possimus ratione sit ut voluptatibus? Cumque, doloremque, quasi?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut beatae cupiditate, enim facilis iusto nemo provident quam quas repellendus ut vero? \r\nDolore maiores odit optio similique. Ad animi beatae corporis dolore, ducimus fugit, labore modi molestiae nisi obcaecati odio odit officia possimus ratione sit ut voluptatibus? Cumque, doloremque, quasi?', 16, 7, 'Снимок экрана 2023-09-23 192845.png', '2023-10-31 13:24:50'),
(9, 'Java lOx', 'Текст-рыба на русском языке ... Если вы заметили неточности, ошибки или у вас есть мысли по улучшению сайта — пишите на dev@fish-text.ru или в комментариях ниже.\r\nТекст-рыба на русском языке ... Если вы заметили неточности, ошибки или у вас есть мысли по улучшению сайта — пишите на dev@fish-text.ru или в комментариях ниже.\r\nТекст-рыба на русском языке ... Если вы заметили неточности, ошибки или у вас есть мысли по улучшению сайта — пишите на dev@fish-text.ru или в комментариях ниже.\r\nТекст-рыба на русском языке ... Если вы заметили неточности, ошибки или у вас есть мысли по улучшению сайта — пишите на dev@fish-text.ru или в комментариях ниже.', 16, 1, '', '2023-11-01 07:09:41'),
(10, 'Photoshoper', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium enim error laudantium molestias, neque numquam officiis placeat quae quaerat quas quisquam quos reiciendis, sapiente sint sunt vel vero voluptates! Alias atque delectus hic magnam minus, necessitatibus nemo nesciunt nobis nostrum officiis quo repellat rerum, sapiente temporibus, unde vero voluptatem! Blanditiis dolore quidem sit vitae. Accusantium debitis dicta doloremque, eum eveniet ipsa iure labore libero natus officiis quam quasi quo sint sit ut velit veniam. Aliquam consequatur dolorem fugiat harum in inventore modi odio placeat ratione sunt. Atque aut autem commodi corporis deleniti eos ipsa iusto laboriosam libero quasi quisquam quo quod rerum sunt, tempora tenetur vel. Animi, eveniet, quibusdam. Architecto consequuntur dignissimos expedita ipsum non officia quo! Adipisci amet asperiores, aut ea exercitationem fuga hic iusto libero magni maiores minima molestias natus praesentium quia quisquam quod repellendus sapiente unde vel velit veniam vero voluptas! Asperiores aut cum cupiditate dolores ex fugiat fugit, ipsa molestias natus odit sequi sint voluptatem voluptates? Aliquam consequuntur cum cumque ducimus explicabo incidunt minima veniam. Aliquam fugiat fugit illo laboriosam libero quasi sint ut vitae! Ad, commodi, deserunt distinctio enim fuga fugiat id ipsa laborum maxime minima nostrum quis saepe similique soluta velit! Pariatur, sed?', 9, 8, 'Снимок экрана 2023-10-02 183812.png', '2023-11-01 09:12:46'),
(11, 'Painter', 'ecruitment is a critical process for organizations, as it directly impacts their success and growth.\r\n                        The importance of efficient and effective recruitment is ever-increasing in today\'s competitive job\r\n                        market. This report discusses the motivations and challenges of developing a recruitment service\r\n                        platform, analyzes existing websites with similar functionalities, outlines the technical\r\n                        specifications of the project, investigates relevant background material and related work, and\r\n                        provides a detailed timetable for achieving project objectives', 3, 9, 'Снимок экрана 2023-09-28 230546.png', '2023-11-01 20:42:10'),
(12, 'Junior Go Programmer', 'Amet assumenda beatae culpa cupiditate ducimus eligendi facilis harum iure laboriosam magnam maxime nam nihil non odio pariatur, perspiciatis, provident quidem quo repellendus repudiandae temporibus ullam unde voluptas? Distinctio in modi vitae. Doloremque excepturi id itaque nulla quae. Architecto assumenda at autem culpa debitis, dicta, eaque ex facere fugiat impedit iure magni nemo nulla obcaecati odit, quae quidem quisquam sint. Animi autem, cum deleniti dicta dolorum eaque fugiat harum illo inventore ipsa ipsam laudantium maiores minima mollitia officia optio perspiciatis praesentium quas repellat similique, sit sunt suscipit, voluptas? Aspernatur enim minima praesentium.', 16, 10, 'Снимок экрана 2023-09-23 192845.png', '2023-11-01 20:43:57'),
(13, 'Python Django', 'Amet assumenda beatae culpa cupiditate ducimus eligendi facilis harum iure laboriosam magnam maxime nam nihil non odio pariatur, perspiciatis, provident quidem quo repellendus repudiandae temporibus ullam unde voluptas? Distinctio in modi vitae. Doloremque excepturi id itaque nulla quae. Architecto assumenda at autem culpa debitis, dicta, eaque ex facere fugiat impedit iure magni nemo nulla obcaecati odit, quae quidem quisquam sint. Animi autem, cum deleniti dicta dolorum eaque fugiat harum illo inventore ipsa ipsam laudantium maiores minima mollitia officia optio perspiciatis praesentium quas repellat similique, sit sunt suscipit, voluptas? Aspernatur enim minima praesentium.', 1, 10, '', '2023-11-01 20:44:46'),
(14, 'Musician piano', 'Amet assumenda beatae culpa cupiditate ducimus eligendi facilis harum iure laboriosam magnam maxime nam nihil non odio pariatur, perspiciatis, provident quidem quo repellendus repudiandae temporibus ullam unde voluptas? Distinctio in modi vitae. Doloremque excepturi id itaque nulla quae. Architecto assumenda at autem culpa debitis, dicta, eaque ex facere fugiat impedit iure magni nemo nulla obcaecati odit, quae quidem quisquam sint. Animi autem, cum deleniti dicta dolorum eaque fugiat harum illo inventore ipsa ipsam laudantium maiores minima mollitia officia optio perspiciatis praesentium quas repellat similique, sit sunt suscipit, voluptas? Aspernatur enim minima praesentium.', 13, 11, '', '2023-11-01 20:45:33'),
(15, 'Web Designer', 'Amet assumenda beatae culpa cupiditate ducimus eligendi facilis harum iure laboriosam magnam maxime nam nihil non odio pariatur, perspiciatis, provident quidem quo repellendus repudiandae temporibus ullam unde voluptas? Distinctio in modi vitae. Doloremque excepturi id itaque nulla quae. Architecto assumenda at autem culpa debitis, dicta, eaque ex facere fugiat impedit iure magni nemo nulla obcaecati odit, quae quidem quisquam sint. Animi autem, cum deleniti dicta dolorum eaque fugiat harum illo inventore ipsa ipsam laudantium maiores minima mollitia officia optio perspiciatis praesentium quas repellat similique, sit sunt suscipit, voluptas? Aspernatur enim minima praesentium.', 7, 11, '', '2023-11-01 20:46:01');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_names` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role_names`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role_id`, `phone`, `name`, `surname`) VALUES
(1, 'alensuchka@ma.com', '1234', 1, '+77097054026', 'Alen', 'Is'),
(2, 'maratnurlan3007@gmail.com', '4321', 1, NULL, NULL, NULL),
(3, 'Hella@kail.loc', '4321', 1, '+77097054026', 'Nurlan', 'Marat'),
(4, 'fish228@mail.com', 'nurik3007', 1, NULL, NULL, NULL),
(6, 'maratnurlan3007@mail.ru', 'nurik228', 1, '+78981238989', 'Amir', 'Kola'),
(7, 'johola228@gmail.com', 'johola228', 1, '+77774302318', 'Arnur', '_'),
(8, 'amir228@mail.com', '228228', 1, '+77097054026', 'Amir', 'Zola'),
(9, 'zarina@mail.kola', '228228', 1, '+71234333333', 'Zarina', 'M.'),
(10, 'boba4008@gmail.com', '1234', 1, '+77774302318', 'Boba', 'L.'),
(11, 'tom228@mail.bo', '1234', 1, '+77774302318', 'Tom', 'K.');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `topic` varchar(100) NOT NULL,
  `salary` float NOT NULL,
  `phone` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `img_path` varchar(150) DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `company_name`, `topic`, `salary`, `phone`, `desc`, `img_path`, `category_id`, `user_id`, `date`) VALUES
(1, 'Unities', '3d Moderator', 120000, '+78981238989', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur assumenda atque commodi consectetur, debitis eum explicabo facilis iusto magnam molestias nam nesciunt nisi nobis omnis pariatur quam quisquam?', '', 1, 1, '2023-11-01 16:25:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_category_id` (`resume_category_id`),
  ADD KEY `resume_user_id` (`resume_user_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Индексы таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_ibfk_1` FOREIGN KEY (`resume_category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `resumes_ibfk_2` FOREIGN KEY (`resume_user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD CONSTRAINT `vacancies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `vacancies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
