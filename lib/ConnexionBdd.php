<?phpnamespace MVCandNamespaces\lib;//Cette classe s'occupe de créer une et une seule connexion à la base de donnéeuse PDO;class ConnexionBdd{	protected $_bdd; //pointeur de la connexion	static protected $_instance; //pointe sur l'existence d'une connexion à la base de donnée		// On utilise le design pattern Singleton pour s'assurer de l'unicité de la connexion	// 1->Constructeur inaccessible depuis l'extérieur	private function __construct()	{		//??chargement fichier de config pour se connecter				//Création de la connexion		try		{			$this->_bdd = new PDO(									"mysql:host=localhost;dbname=MVCandNamespaces;charset=utf8",									"root",									""									);		} catch(PDOException $e) {			echo $e;		}	}		// 2->Instanciation de la classe dans la classe	static public function getInstance()	{		// Si aucune connexion n'a été instanciée <=> si $_instance n'a pas été définie(null)		if( true === is_null(static::$_instance) )		{			static::$_instance = new static(); //On instancie une connexion en appelant le constructeur!		}				return static::$_instance; //On retourne l'instance nouvelle ou existante !	}		public function __call($method, array $arg) {      // Si on appelle une méthode qui n'existe pas, on       // delegue cet appel à l'objet PDO $this->_db	  var_dump($this->_bdd);      return call_user_func_array(array($this->_bdd, $method), $arg);   }}