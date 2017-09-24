

CREATE TABLE `dz`.`question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_description` varchar(255) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dz`.`quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dz`.`result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `result_name` varchar(255) NOT NULL,
  `result_description` TEXT NOT NULL,
  `quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `fk_result_quiz1_idx` (`quiz_id`),
  CONSTRAINT `fk_result_quiz1` FOREIGN KEY (`quiz_id`) REFERENCES `dz`.`quiz` (`quiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `dz`.`user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `dz`.`user` VALUES (1,'admin',md5('admin'));


CREATE TABLE `dz`.`option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_description` varchar(255) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `fk_option_question_idx` (`question_id`),
  KEY `fk_option_result1_idx` (`result_id`),
  CONSTRAINT `fk_option_question` FOREIGN KEY (`question_id`) REFERENCES `dz`.`question` (`question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_option_result1` FOREIGN KEY (`result_id`) REFERENCES `dz`.`result` (`result_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO  `dz`.`quiz` (`quiz_id`, `quiz_nome`) VALUES
(1, 'Qual sua série?');

INSERT INTO `dz`.`result` (`result_id`, `result_name`,`result_description`,  `quiz_id`) VALUES
(1, 'House of Cards', 'Ataca o problema com método e faz de tudo para resolver a situação.', 1),
(2, 'Game of Thrones','Não tem muita delicadeza nas ações, mas resolve o problema de forma prática.', 1),
(3, 'Lost', 'Faz as coisas sem ter total certeza se é o caminho certo ou se faz sentido, mas no final dá tudo certo.',1),
(4, 'Breaking Bad', 'Pra fazer acontecer você toma a liderança, mas sempre contando com seus parceiros.', 1),
(5, 'Silicon Valley', 'Vive a tecnologia o tempo todo e faz disso um mantra para cada situação no dia.',1);

INSERT INTO  `dz`.`question` (`question_id`, `question_description`) VALUES
(1, 'De manhã, você:'),
(2, 'Indo para o trabalho você encontra uma senhora idosa caída na rua.'),
(3, 'Chega no prédio e o elevador está cheio.'),
(4, 'Você chega no trabalho e as convenções sociais te obrigam a puxar assunto.'),
(5, 'A pauta pegou o dia todo, mas você está indo para casa.');


INSERT INTO `dz`.`option` (`option_id`, `option_description`, `question_id`, `result_id`) VALUES
(1, 'Acorda cedo e come frutas cortadas metodicamente.', 1, 1),
(2, 'Sai da cama com o despertador e se prepara para a batalha da semana.', 1, 2),
(3, 'Só consegue lembrar do seu nome depois do café.', 1, 3),
(4, 'Levanta e faz café pra todos da casa.', 1, 4),
(5, 'Passa o café e conserta um erro no HTML.', 1, 5),
(6, 'Ela vai atrapalhar seu horário. Oculte o corpo.', 2, 1),
(7, 'Levanta a senhora e jura protegê-la com sua vida.', 2, 2),
(8, 'Ajuda-a, mas questiona sua real identidade.', 2, 3),
(9, 'Oferece para caminharem juntos até um destino em comum.', 2, 4),
(10, 'Testa se ela roda bem no Firefox. Não roda.', 2, 5),
(11, 'Convence parte das pessoas a esperarem o próximo.', 3, 1),
(12, 'Ignora as pessoas no elevador e entra de qualquer forma.', 3, 2),
(13, 'Você questiona a realidade, as coisas e tudo mais. Sobe de escada.', 3, 3),
(14, 'Com uma leve intimidação passivo-agressiva, encontra um lugar no elevador.', 3, 4),
(15, 'Cria um app que mostra a lotação do elevador. Vende o app e fica milionário.', 3, 5),
(16, 'Fala sobre a política, eleições, como tudo é um absurdo.', 4, 1),
(17, 'Larga uma frase polêmica e vê uma pequena guerra se formar.', 4, 2),
(18, 'Puxa um assunto e te lembram que já foi discutido semana passada.', 4, 3),
(19, 'Sugere que os colegas trabalhem na ideia de um novo projeto.', 4, 4),
(20, 'Desabafa sobre como odeia PHP. Todo mundo na sala adora PHP.', 4, 5),
(21, 'Vou chamar aqui o meu Uber.', 5, 1),
(22, 'Pegarei o bus junto com o resto do povo.', 5, 2),
(23, 'No ponto de ônibus mais uma vez, espero não errar a linha de novo.', 5, 3),
(24, 'Vou de carro, mas ofereço uma carona para os colegas.', 5, 4),
(25, 'Acho que descobri uma forma de fazer aquela senhora rodar no Firefox.', 5, 5);