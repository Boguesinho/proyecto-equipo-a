using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using RestSharp;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using proyectoRed.Models;
using RestSharp.Authenticators;
using RestSharp.Serialization.Json;
using System.Web.Script.Serialization;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para Login.xaml
    /// </summary>
    public partial class Login : Window
    {
        public Login()
        {
            InitializeComponent();
        }

        private bool validacion()
        {
            if (txtBox_Password.Password.Length >= 6 && txtBox_Usuario.Text.Length >= 6)
            {
                return true;
            }
            return false;
        }

        private bool validacionVacios()
        {
            if (txtBox_Password.Password.Length == 0 && txtBox_Usuario.Text.Length == 0)
            {
                return true;
            }

            return false;
        }
        private bool validacionContrasenaMenor()
        {
            if (txtBox_Password.Password.Length  < 6 )
            {
                return true;
            }

            return false;
        }

        private void btn_Ingresar_Click(object sender, RoutedEventArgs e)
        {
            if (validacion())
            {
                var client = new RestClient(Constant.url);


                var request = new RestRequest("login", Method.GET);


                request.AddParameter("username", txtBox_Usuario.Text);
                request.AddParameter("password", txtBox_Password.Password);

                
                RestResponse<LoginResponse> response = (RestResponse<LoginResponse>)client.Execute<LoginResponse>(request);
                var token = response.Data.Token;

                String authtoken = "Bearer "+token;
                Constant.authToken = authtoken;

                Console.WriteLine(authtoken);

                if (response.IsSuccessful)
                {
                    Constant.username=txtBox_Usuario.Text;
                    Console.WriteLine("Acceso correcto");

                    MainWindow main = new MainWindow();
                    main.Show();
                    this.Close();
                }
                else
                {
                    Console.WriteLine("Acceso incorrecto con data: " + response.Content);
                }
            }
            else
            {
                if (validacionVacios())
                {
                    MessageBox.Show("Llene los campos vacios");
                }
                if (validacionContrasenaMenor())
                {
                    MessageBox.Show("La contraseña debe ser mayor a 6 digitos");
                }
            }
        }

        private void btn_Registrar_Click(object sender, RoutedEventArgs e)
        {
            RegistraUsuario ventanaRegistro = new RegistraUsuario();
            ventanaRegistro.Show();
            this.Close();
        }
    }
}
