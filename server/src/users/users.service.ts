import {HttpException, HttpStatus, Injectable} from '@nestjs/common';
import {Korisnik} from "../entity/Korisnik.entity";
import {InjectRepository} from "@nestjs/typeorm";
import {DeleteResult, Repository, UpdateResult} from "typeorm";

@Injectable()
export class UsersService {

    constructor(
        @InjectRepository(Korisnik)
        private korisnikRepository: Repository<Korisnik>,
    ) {}

    async findAll() : Promise<Korisnik[]>  {
        return await this.korisnikRepository.find();
    }

    async findOne(id: number): Promise<Korisnik> {
        const u = await this.korisnikRepository.findOne(id);
        if (!u){
            throw new HttpException(
                "User with given id not found",
                HttpStatus.BAD_REQUEST
            )
        }
        return u;
    }

    async create(korisnik: Korisnik): Promise<boolean> {
        try {
            const u = await this.korisnikRepository.save(korisnik);
}
        catch (e) {
            throw new HttpException(
                e.message,
                HttpStatus.BAD_REQUEST
            );
        }
        return true;
    }

    async remove(id: number) : Promise<boolean> {
        const film = await this.korisnikRepository.delete(id);
        if (film.raw.affectedRows === 0){
            throw new HttpException(
                "User with given id not found",
                HttpStatus.BAD_REQUEST
            )
        }
        return true;
    }

    async update(korisnik: Korisnik, id: any) : Promise<boolean>{
        try {
            const result = await this.korisnikRepository.update(id, korisnik);
            if (result.raw.affectedRows === 0) {
                throw new HttpException(
                    'User with given id not found',
                    HttpStatus.NOT_FOUND
                );
            }
            return true;
        }
        catch (error)
        {
            if (error instanceof HttpException && error.getStatus() == HttpStatus.NOT_FOUND) throw error;
            throw new HttpException(
                error.message,
                HttpStatus.SERVICE_UNAVAILABLE
            );
        }
    }

    async findByUsername(user:string) : Promise<Korisnik> {
        const u = await this.korisnikRepository.findOne({where: {Username: user}});
        if (!u){
            throw new HttpException(
                "User with given username not found",
                HttpStatus.BAD_REQUEST
            )
        }
        return u;
    }
}
