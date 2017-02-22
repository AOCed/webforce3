<?php

class Chat
{

    private $name;
    private $age;
    private $color;
    private $gender;
    private $race;

	/**
	 * Constructeur
	 *
     * @param string $name     Le nom du chat
     * @param string $age      L'âge du chat
     * @param string $color    La couleur du chat
     * @param string $gender   Le genre du chat
	 * @param string $race     La race du chat
	 */
	public function __construct($name, $age, $color, $gender, $race)
	{
        $this->setName($name);
        $this->setAge($age);
        $this->setColor($color);
        $this->setGender($gender);
		$this->setRace($race);
	}

    /**
     * Récupère la valeur de Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Paramètre la valeur de Name
     *
     * @param string $name Le nom du chat
     *
     * @return self
     */
    public function setName($name)
    {
        if (strlen($name) < 3) {
            $name = 'Le nom doit faire au moins <strong>3</strong> caractères';
        } elseif (strlen($name) > 20) {
            $name = 'Le nom ne peut pas faire plus de <strong>20</strong> caractères';
        }

        $this->name = $name;

        return $this;
    }

    /**
     * Récupère la valeur de Age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Paramètre la valeur de Age
     *
     * @param int $age L'âge du chat
     *
     * @return self
     */
    public function setAge($age)
    {
        // Note : l'énoncé demande un entier donc j'ai choisi is_int mais is_numeric aurait pu être acceptable si on avait voulu que '7' soit aussi valable que 7
        if (!is_int($age)) {
            $age = 'L\'âge doit être un entier';
        }

        $this->age = $age;

        return $this;
    }

    /**
     * Récupère la valeur de Color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Paramètre la valeur de Color
     *
     * @param string $color  La couleur du chat
     *
     * @return self
     */
    public function setColor($color)
    {
        if (strlen($color) < 3) {
            $color = 'La couleur doit faire au moins <strong>3</strong> caractères';
        } elseif (strlen($color) > 10) {
            $color = 'La couleur ne peut pas faire plus de <strong>10</strong> caractères';
        }

        $this->color = $color;

        return $this;
    }

    /**
     * Récupère la valeur de Gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Paramètre la valeur de Gender
     *
     * @param string $gender   Le genre du chat
     *
     * @return self
     */
    public function setGender($gender)
    {
        $allowed = array(
            'Mâle',
            'Femelle'
        );

        if (!in_array($gender, $allowed)) {
            $gender = 'Le genre doit être Mâle ou Femelle';
        }

        $this->gender = $gender;

        return $this;
    }

    /**
     * Récupère la valeur de Race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Paramètre la valeur de Race
     *
     * @param string $race   La race du chat
     *
     * @return self
     */
    public function setRace($race)
    {
        if (strlen($race) < 3) {
            $race = 'La race doit faire au moins <strong>3</strong> caractères';
        } elseif (strlen($race) > 20) {
            $race = 'La race ne peut pas faire plus de <strong>20</strong> caractères';
        }

        $this->race = $race;

        return $this;
    }

    public function getInfos()
    {
        $infos = array(
            'name'   => $this->getName(),
            'age'    => $this->getAge(),
            'color'  => $this->getColor(),
            'gender' => $this->getGender(),
            'race'   => $this->getRace()
        );

        return $infos;
    }

}
