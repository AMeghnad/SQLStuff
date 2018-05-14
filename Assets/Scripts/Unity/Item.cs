using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Item 
{
	public int id { get; set;}
	public string name { get; set;}
}
public class Weapon: Item
{
	public int damage { get; set;}
	public string ammoType { get; set;}
	public float weaponRange { get; set;}
	public GameObject meshName { get; set;}
	public Texture2D icon { get; set;}
	public int clipSize { get; set;}

	public Weapon(int id, string name, int damage, string ammoType, float weaponRange, string meshName, string icon, int clipSize)
	{
		this.id = id;
		this.name = name;
		this.damage = damage;
		this.ammoType = ammoType;
		this.weaponRange = weaponRange;
		this.meshName = Resources.Load ("Prefabs/" + meshName)as GameObject;
		this.icon = Resources.Load ("Icons/" + icon)as Texture2D;
		this.clipSize = clipSize;
	}
}
