using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GrabChars : MonoBehaviour {
	public string username;

	// Use this for initialization
	void Start () 
	{
		StartCoroutine (GetChars(username));
	}
	
	IEnumerator GetChars(string username)
	{
		string createCharURL = "http://localhost/loginsystem/getallcharacters.php";
		WWWForm user = new WWWForm ();
		user.AddField ("username_Post", username);
		WWW www = new WWW (createCharURL, user);
		yield return www;
		Debug.Log (www.text);
	}
}
