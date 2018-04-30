using System.Collections;
using System.Collections.Generic;
using UnityEngine;

// Use these to send emails to anyone
using System.Net;
using System.Net.Mail;
using System.Net.Security;
using System.Security.Cryptography.X509Certificates;

public class Login : MonoBehaviour
{
    public string userName, eMail, passWord;
    public string notify = "";

    [Header("Reset Code")]
    private string resetCode;
    private string codeCharacterList = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private int codeLength = 6;

    // Use this for initialization
    void Start()
    {
        eMail = "anshumanmeghnad@gmail.com";
    }

    // Update is called once per frame
    void Update()
    {

    }

    void OnGUI()
    {
        float scrH = Screen.height / 9;
        float scrW = Screen.width / 16;
        if (notify != "")
        {
            GUI.Box(new Rect(0, 0, Screen.width, scrH * 0.75f), notify);
        }
        if (GUI.Button(new Rect(scrW, scrH, 2 * scrW, scrH), "Reset Password"))
        {
            MailMessage mail = new MailMessage();

            mail.From = new MailAddress("sqlunityclasssydney@gmail.com");
            mail.To.Add(eMail);
            mail.Subject = "Reset Password";
            mail.Body = "Click the link below to reset your password!";

            // Simple Mail Transfer Protocol
            SmtpClient smtpServer = new SmtpClient("smtp.gmail.com");
            smtpServer.Port = 25;
            smtpServer.Credentials = new System.Net.NetworkCredential("sqlunityclasssydney@gmail.com", "sqlpassword") as ICredentialsByHost;
            smtpServer.EnableSsl = true;

            ServicePointManager.ServerCertificateValidationCallback = delegate (object s, X509Certificate cert, X509Chain chain, SslPolicyErrors policyErrors)
            {
                return true;
            };

            smtpServer.Send(mail);
            Debug.Log("Email sent");
        }
    }

    IEnumerator CreateAccount(string username, string email, string password)
    {
        string createUserURL = "http://localhost/loginsystem/insertuser.php";
        WWWForm user = new WWWForm();
        user.AddField("username_Post", username);
        user.AddField("email_Post", username);
        user.AddField("password_Post", password);
        WWW www = new WWW(createUserURL, user);
        yield return www;
        Debug.Log(www.text);
        #region Notifications
        Debug.Log("Sending");
        StartCoroutine(CreateAccount(userName, eMail, passWord));
        #endregion
    }

    IEnumerator LoginAttempt(string username, string password)
    {
        string loginURL = "http:// localhost/loginsystem/login.php";
        WWWForm loginForm = new WWWForm();
        loginForm.AddField("username_Post", username);
        loginForm.AddField("password_Post", password);
        WWW www = new WWW(loginURL, loginForm);
        yield return www;
        Debug.Log(www.text);
    }

    void ResetCode()
    {
        resetCode = "";
        while (resetCode.Length < codeLength)
        {
            codeLength += codeCharacterList[UnityEngine.Random.Range(0, codeCharacterList.Length)];
        }
    }

    void LoginButton()
    {

    }

    void Register()
    {

    }
}
