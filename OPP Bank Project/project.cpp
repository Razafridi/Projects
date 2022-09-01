#include<iostream>
#include<string>
#include<fstream>
using namespace std;
//global variable

//Function prototype
void split(string st,string *arr);
int strToInt(string val);
string intToStr(int val);
string enCode(string str);
string deCode(string str);
void showMenu();
void registerUser();
void signIn();
void withdrawal();
void deposite();
//Class definition
class Bank{
    public:
        bool isLogin = false;
        string userId = "";
        int amount = 0;
        string name = "";

        Bank(){
            fstream file;
            file.open("database.txt",ios::app);
            file.close();
        }
    bool createUser(string id ,string pass,string name,int amount){
        bool ids = getId(id);
        if(ids == false){
            fstream file ;
            file.open("database.txt",ios::app);
            file<<id<<" "<<pass<<" "<<name<<" "<<amount<<"\n";
            file.close();
            return true;
        }else{
            return false;
        }
    }

    bool logIn(string id,string pass){
        fstream file;
        file.open("database.txt",ios::in);
        string line;
        string arr[4];
        while(getline(file,line)){
            split(line,arr);
            if(id==arr[0] && pass == arr[1]){
                isLogin = true;
                userId = arr[0];
                name = arr[2];
                amount = strToInt(arr[3]);
                return true;
            }
        }
        file.close();
        return false;

    }

    void logOut(){
        if(isLogin){
            isLogin = false;
            userId = "";
            name = "";
            amount = 0;
        }

    }

    void showInfo(string id){
        fstream file;
        file.open("database.txt",ios::in);
        string line;
        string arr[4];
        while(getline(file,line)){
            split(line,arr);
            if(arr[0] == id){
                cout<<endl<<"--------------------------------------------------------"<<endl;
                cout<<"Name : "<<deCode(arr[2])<<endl<<"UserId : "<<arr[0]<<endl<<"Balance : "<<arr[3]<<endl;
                cout<<"--------------------------------------------------------"<<endl;
                break;
            }
        }
        file.close();
    }

    void withdrawal(string uid,int amnt){

    fstream file;
        file.open("database.txt",ios::in);
        string line;
        string arr[4];
        string fil[1000][4];
        int tot = 0;
        int i =0,index =0;
        while(getline(file,line)){
            split(line,arr);
            if(uid == arr[0]){
                tot = strToInt(arr[3]) - amnt;
                arr[3] = intToStr(tot);
                index = i;
            }
            for(int k=0;k<4;k++){
                fil[i][k] = arr[k];
            }
            i++;
        }
        file.close();

        fstream file2;
        file2.open("database.txt",ios::out);
        for(int t=0;t<=i;t++){
                if(fil[i][0] != " "){
            file2<<fil[t][0]<<" "<<fil[t][1]<<" "<<fil[t][2]<<" "<<fil[t][3]<<"\n";
                }


        }
        file2.close();

    }

    void deposite(string uid,int amnt){

    fstream file;
        file.open("database.txt",ios::in);
        string line;
        string arr[4];
        string fil[1000][4];
        int tot = 0;
        int i =0,index =0;
        while(getline(file,line)){
            split(line,arr);
            if(uid == arr[0]){
                tot = strToInt(arr[3]) + amnt;
                arr[3] = intToStr(tot);
                index = i;
            }
            for(int k=0;k<4;k++){
                fil[i][k] = arr[k];
            }
            i++;
        }
        file.close();

        fstream file2;
        file2.open("database.txt",ios::out);
        for(int t=0;t<=i;t++){
                if(fil[i][0] != " "){
            file2<<fil[t][0]<<" "<<fil[t][1]<<" "<<fil[t][2]<<" "<<fil[t][3]<<"\n";
                }


        }
        file2.close();

    }

    bool getId(string id){
        fstream file;
        file.open("database.txt",ios::in);
        string line;
        string arr[4];
        while(getline(file,line)){
            split(line,arr);
            if(arr[0] == id){
                return true;
            }
        }

        file.close();
        return false;
    }
};

Bank bank;

//main
int main(){

showMenu();

}

//function defenation
void showMenu(){
int op;
cout<<"1. Create Account \n";
cout<<"2. Check Balance  \n";
cout<<"3. withdrawal Amount\n";
cout<<"4. Deposit Money\n";
cin>>op;
if(op < 0 || op > 4){
    cout<<"Invalid Option ! Try again"<<endl;
    showMenu();
}else{
    if(op == 1){
        registerUser();
    }else if(op == 2){
        signIn();
    }else if(op==3){
        withdrawal();
    }else{
        deposite();
    }
}
}
void split(string st,string *arr){
    string full;
    int j=0;
    for(int i=0; i<st.length();i++){
        if(st[i]!=' ' && i !=st.length()-1){
            full+=st[i];
        }else{
                if( i ==st.length()-1){
                    full+=st[i];
                }
            *(arr+j) = full;
            full = "";
            j++;
        }
    }
}

int strToInt(string val){
    int j=0;
    int tot =0;
    char num[10] = {'0','1','2','3','4','5','6','7','8','9'};
    while(val[j]!='\0'){
            for(int i=0;i<10;i++){
                if(val[j] == num[i]){
                    tot = (tot*10)+i;
                }
            }
        j++;
    }
    return tot;
}

string intToStr(int val){
    int dup = val;
    string tot ="";
    char num[10] = {'0','1','2','3','4','5','6','7','8','9'};
    while(val>0){
            int l = val%10;
            for(int i=0;i<10;i++){
                if(l == i){
                    tot = num[i] + tot;
                }
            }

        val = val/10;
    }
    return tot;
}

string enCode(string str){
    int i =0;
    while(str[i] != '\0'){
        if(str[i] == ' '){
            str[i] = '#';

            }
            i++;        }
    return str;
}
string deCode(string str){
    int i =0;
    while(str[i] != '\0'){
        if(str[i] == '#'){
            str[i] = ' ';

            }
            i++;        }
    return str;
}

void registerUser(){
    string id,pass,fname,lname,name;

    int amount;
    cout<<"Create a new Account:"<<endl;
    cout<<"Note: The userId should be equal its length to 5"<<endl;
    cout<<"Password length shold be equal or greater than 5"<<endl;
    cout<<"Enter your full name "<<endl;
    cout<<"The Amount Should be greater or equal to 1000."<<endl;
    do{
        cout<<"Enter UserId : ";
        cin>>id;
        cout<<"Enter your first  name : ";
        cin>>fname;
        cout<<"Enter your Last  name : ";
        cin>>lname;
        name = fname+"#"+lname;
        cout<<"Enter Amount : ";
        cin>>amount;
        cout<<"Enter your password : ";
        cin>>pass;
    }
    while(id.length() < 5 || amount <1000 || pass.length() < 5);
    if(bank.createUser(id,pass,name,amount)){
        cout<<"Your Accout is successfully Created!\n";
        showMenu();
    }else{
        cout<<"This account is already exist\n";
        registerUser();
    }
}
void signIn(){
cout<<"Sign Into Account"<<endl;
string id,pass;
cout<<"Enter your ID  : ";
cin>>id;
cout<<"Enter Your Password : ";
cin>>pass;
if(bank.logIn(id,pass)){
    cout<<"You have log In"<<endl;
    bank.showInfo(bank.userId);
    showMenu();
}else{
    cout<<"May be you have enter Wrong information : "<<endl;
    signIn();
}
}

void withdrawal(){
cout<<"Sign Into Account"<<endl;
string id,pass;
cout<<"Enter your ID  : ";
cin>>id;
cout<<"Enter Your Password : ";
cin>>pass;
if(bank.logIn(id,pass)){
    cout<<"You have log In"<<endl;
    int amnt =0;
    cout<<"Enter Your Amount : ";
    cin>>amnt;
    if(amnt > bank.amount){
        cout<<"Sorry you can not withdrawal "<<amnt<<" Amount \n"<<"Your Current Balance is "<<bank.amount<<endl;
    }else{
        bank.withdrawal(id,amnt);
        cout<<"You have successfully withdrawal "<<amnt<<" Amount "<<endl;
        bank.showInfo(id);
        showMenu();
    }
}else{
    cout<<"May be you have enter Wrong information : "<<endl;
    withdrawal();
}
}

void deposite(){
cout<<"Sign Into Account"<<endl;
string id,pass;
cout<<"Enter your ID  : ";
cin>>id;
cout<<"Enter Your Password : ";
cin>>pass;
if(bank.logIn(id,pass)){
    cout<<"You have log In"<<endl;
    int amnt =0;
    cout<<"Enter Your Amount : ";
    cin>>amnt;

        bank.deposite(id,amnt);
        cout<<"You have successfully Deposite "<<amnt<<" Amount "<<endl;
        bank.showInfo(id);
        showMenu();

}else{
    cout<<"May be you have enter Wrong information : "<<endl;
    deposite();
}
}
