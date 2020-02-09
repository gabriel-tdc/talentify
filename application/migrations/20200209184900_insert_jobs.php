<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_jobs extends CI_Migration {

	public function up() {
        foreach ($this->seedData as $seed ) {
            $sql = 'INSERT INTO jobs (`id`, `title`, `slug`, `description`, `status`, `workplace`, `salary`) VALUES '.$seed;
            $this->db->query($sql);
        }
	}

	public function down() {
		$sql = "DELETE FROM jobs WHERE id = 1 OR id = 2 OR id = 3";
		$this->db->query($sql);
	}

	private $seedData = array(
		'(1, "Recruiter, Google Cloud", "60817-recruiter-google-cloud-english-portuguese", "Minimum Qualifications\n • Bachelor\'s degree or equivalent practical experience.\n • Experience in recruiting for enterprise or corporate sales.\n • 3 years of full-cycle recruiting experience in an agency or corporate setting.\n • Ability to speak and write in English and Portuguese fluently and idiomatically. \n Preferred Qualifications\n • Experience closing a diverse range of executive-level candidates and negotiating complex compensation packages.\n • Experience solving complex problems and delivering significant impact as an individual contributor.\n • Track record of personal accountability, excellent work ethic, integrity and proven organizational skills with great attention to detail.\n • Ability to handle customer relationship management, provide exceptional customer consultative skills and work in a large team environment.\n • Excellent communication and interpersonal skills with proven ability to take initiative and build productive relationships.\n About the jobGoogle\'s known for our innovative technologies, products and services -- and for the people behind them. As part of our recruiting team, you\'re charged with finding the most interesting candidates who bring an entrepreneurial spirit and a diversity of thought to all they do. You\'re responsible for guiding candidates through our hiring process and connecting them to the magic of working at Google. You are creative and driven, which allows you to develop lasting relationships with both candidates and hiring managers. You\'re also comfortable with numbers and drawing insights from analytics to make our hiring process smarter and more efficient.\n Great just isn\'t good enough for our People Operations team (you probably know us better as \"Human Resources\"). Made up of equal parts HR professionals, former consultants, and analysts, we\'re the advocates of Google\'s colorful culture. In People Ops, we \"find them, grow them, and keep them\". We bring the world\'s most innovative people to Google and provide the programs that help them thrive. Whether recruiting the next Googler, refining our core programs, developing talent, or simply looking for ways to inject some more fun into the lives of our Googlers, we bring a data-driven approach that is reinventing the human resources field.", 1, "São Paulo, SP", 1000)',
		'(2, "Estagio na Microsoft", "71314-estagio-na-microsoft", "Estudantes dos cursos: Ciências da Computação, Administração de Empresas, Economia, Marketing, Direito, Engenharias, Jornalismo, Publicidade, Relações Internacionais, Sistemas de Informação, e outros;\nEstar cursando o penúltimo ou último ano da graduação;\nInglês fluente;\nDisponibilidade para trabalhar de 20h a 30h semanais.", 1, "", 0)',
		'(3, "Internal Auditor","71781-internal-auditor-credit-specialist","Credit Risk experience\nFluent in English\nSolid analytical background. Must be comfortable manipulating data to perform audits;\nProgramming is not required but candidates need to display interest in learning basic data analysis skills (SQL, Python, R);\nGreat team player, communication (written and verbal) and listening skills;\nHands-on and willing to get hands dirty on execution;\nGreat business judgment and ability (and interest) to make, both, strategic and operational decisions;\nSelf-starter and ability to work independently;\nAbility to tackle complex problems involving a number of topics/variables, such as business, regulatory, finance and product;","1","",0)'
    );
}
