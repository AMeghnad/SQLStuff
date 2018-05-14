using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Inventory : MonoBehaviour 
{
	public string[] itemList;
	public bool loaded;
	private Vector2 scr;
	public List<Item> item;
	public Dictionary<int, Weapon> weapons = new Dictionary<int, Weapon> ();

	// Use this for initialization
	void Start () 
	{
		StartCoroutine (LoadItemData());
	}
	
	// Update is called once per frame
	void Update () 
	{
		
	}

	void OnGUI()
	{
		if(!loaded)
		{
			scr.x = Screen.width / 16;
			scr.y = Screen.height / 9;
			if(!loaded)
			{
				GUI.Box(new Rect(scr.x * 0, scr.y * 0, scr.x * 10, scr.y ), "Loading...");
			}
		}
	}

	IEnumerator LoadItemData()
	{
		WWW itemDataURL = new WWW ("localhost/loginsystem/Inventory.php");
		yield return itemDataURL;
		string textDataString = itemDataURL.text;
		string[] items = textDataString.Split ('#');
		itemList = new string[items.Length - 1];
		for (int i = 0; i < items.Length - 1; i++) 
		{
			itemList [i] = items [i];
		}
		SetItems ();
	}

	void SetItems()
	{
		for (int i = 0; i < itemList.Length; i++) 
		{
			string[] current = itemList [i].Split ('|');
			Weapon weapon = new Weapon (int.Parse(current[0]), current[1], int.Parse(current[2]), current[3], float.Parse(current[4]), current[5], current[6], int.Parse(current[7]));
			weapons.Add (weapon.id, weapon);
			Debug.Log (weapons [i].name);
		}
		loaded = true;
	}
}
